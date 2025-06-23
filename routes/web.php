<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use MongoDB\BSON\UTCDateTime;
use Jenssegers\Mongodb\Eloquent\Model;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store'])->middleware('throttle');


Route::post('/signup', [RegisteredUserController::class, 'store']);
Route::get('/signup', [RegisteredUserController::class, 'create']);



Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {

        $user = Auth::user();

        // Calculate survey responses for this user
        $totalSurveyResponses = Survey::where('user_id', $user->_id)
                                        ->where('published', true)
                                        ->with('responses')
                                        ->get()
                                        ->sum(function ($survey) {
                                            return $survey->responses->count();
                                        });

    // ------- Data for Charts ----------

        // -------- Data for Number of Survey Responses in last 15 days ------ //
        $responses = SurveyResponse::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$match' => [
                        'submitted_at' => [
                            '$gte' => new UTCDateTime(Carbon::now()->subDays(15)),
                        ],
                    ],
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%d-%m',
//                                'format' => '%d',
                                'date' => '$submitted_at',
                            ],
                        ],
                        'count' => ['$sum' => 1],
                    ],
                ],
                [
                    '$sort' => ['_id' => 1],
                ],
                [
                    '$project' => [
                        'date' => '$_id',
                        'count' => 1,
                        '_id' => 0,
                    ],
                ],
            ]);
        });

        // Generate all dates for the last 15 days
        $dates = collect(range(14, 0))->map(function ($i) {
            return Carbon::now()->subDays($i)->format('d-m');
//            return Carbon::now()->subDays($i)->format('d');
        });

        // Map responses to ensure all dates are included
        $responses = collect($responses)->keyBy('date');
        $data = $dates->map(function ($date) use ($responses) {
            return [
                'date' => $date,
                'count' => $responses->has($date) ? $responses[$date]['count'] : 0,
            ];
        });

        $dates = $data->pluck('date')->toArray();
        $counts = $data->pluck('count')->toArray();


        // -------- Data for Top 5 most responded surveys ------ //
        $surveyStats = SurveyResponse::raw(function ($collection) {
            return $collection->aggregate([
                [
                    // Groups documents by survey_id field and calculate the number of responses for each survey
                    '$group' => [
                        '_id' => '$survey_id',
                        'count' => ['$sum' => 1],
                    ],
                ],
                [

                    // Sorts the grouped document into descending order (highest to lowest)
                    '$sort' => ['count' => -1],
                ],
                [
                    // Restrict the output to be only first five documents
                    '$limit' => 5,  // Top 5 Surveys

                ],
                [
                    // Reshape the output document to include only the desired fields
                    '$project' => [
                        'survey_id' => '$_id',
                        'count' => 1,   // 1 means to include this field
                        '_id' => 0,
                    ],
                ],
            ]);
        });

        // Fetch survey names
        $surveyIds = array_column($surveyStats->toArray(), 'survey_id');
        $surveyNames = Survey::whereIn('_id', $surveyIds)->pluck('name', 'id')->toArray();

        $surveyStats = collect($surveyStats)->map(function ($stat) use ($surveyNames) {
            $stat['survey_name'] = $surveyNames[$stat['survey_id']] ?? 'Unknown Survey';
            return $stat;
        })->toArray();

        // Handle empty results
        if (empty($surveyStats)) {
            $surveyStats = [['survey_id' => null, 'survey_name' => 'No Data', 'count' => 0]];
        }

        $topSurveyNames = array_column($surveyStats, 'survey_name');
        $topSurveyCounts = array_column($surveyStats, 'count');

//        dd($topSurveyNames);

        return view('dashboard', ['user' => $user, 'totalSurveyResponses' => $totalSurveyResponses, 'dates' => $dates, 'counts' => $counts, 'topSurveyNames' => $topSurveyNames, 'topSurveyCounts' => $topSurveyCounts]);
    });

    Route::get('/profile', [RegisteredUserController::class, 'show']);
    Route::get('/edit-profile', [RegisteredUserController::class, 'edit']);
    Route::patch('/update-profile/{id}', [RegisteredUserController::class, 'update']);


    Route::get('/survey/create', [SurveyController::class, 'create']);
    Route::post('/survey/create', [SurveyController::class, 'store']);

    // Define Model Bound routes at the bottom of the page
    Route::get('/surveys', [SurveyController::class, 'index']);
//    Route::get('/survey/edit', [SurveyController::class, 'edit']);
    Route::get('/survey/{id}-{slug}', [SurveyController::class, 'show']);
    Route::get('/published/{id}', function ($id){

        $survey = Survey::find($id);
        if($survey){
            $survey->published = true;
            $survey->save();
            return view('surveys.published', ['survey' => $survey]);
        }
        else{
            return redirect()->back()->with('error', 'Survey not found!');
        }

    });

    Route::delete('/survey/{id}', [SurveyController::class, 'destroy']);

    // Routes for survey response
    Route::get('/survey/published/{survey}-{slug}', [SurveyResponseController::class, 'show']);
    Route::post('/survey/published/{survey}-{slug}', [SurveyResponseController::class, 'store']);



    Route::post('/logout', [SessionController::class, 'destroy']);
});
