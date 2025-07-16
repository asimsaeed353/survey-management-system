<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently logged-in user
        $surveys= $user->surveys()->orderBy('created_at', 'desc')->get(); // fetch all the surveys belong to that user

        $surveys = $surveys->fresh();

//        $surveys = Survey::with('user')->latest()->get();

        return view('surveys.index', ['surveys' => $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->file('qFile'));

//        dd($request->all());


        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'description' => ['string', 'nullable'],
            'questions' => ['required', 'array', 'min:1'],
            'questions.*.type' => ['required', 'string'],
            'questions.*.question' => ['required', 'string'],
            'questions.*.options' => ['sometimes', 'array', 'min:2'],
            'questions.*.options.*' => ['string', 'required', 'min:1'],
        ]);



//        $validated = $request->validate([
//            'name' => ['required','string', 'max:255'],
//            'description' => ['string', 'nullable'],
//            'questions' => ['required', 'array', 'min:1'], // ensures at least 1 question
//            'questions.*.type' => ['required', 'string'],
//            'questions.*.question' => ['required', 'string'],
//            'questions.*.options' => ['nullable', 'array'],
//            'questions.*.options.*' => ['nullable', 'string', 'min:1'],
//        ]);


        $survey = Survey::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
            'published' => false,
        ]);

        foreach ($validated['questions'] as $quest){
            $question = Question::create([
                'type' =>  $quest['type'],
                'question' => $quest['question'],
                'survey_id' => $survey->_id,
            ]);

            if($quest['type'] === 'mcq'){
                foreach ($quest['options'] as $option){
                    Option::create([
                        'option' => $option,
                        'question_id' => $question->_id
                    ]);
                }
            }
        }

        session()->flash('success', 'Survey saved successfully!');

        return redirect('surveys');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Eager loads the nested relation
        $survey = Survey::with('questions.options')->findOrFail($id);

        $surveyResponses = SurveyResponse::where('survey_id', $survey->_id)->get();
        $totalResponses = $surveyResponses->count();

        $respondentEmails = SurveyResponse::where('survey_id', $survey->_id)->pluck('respondent_email');

//        dd($participantEmail);

        $responseStats = [];


        foreach ($survey->questions as $question){
            $questionId = (string)$question->_id;
            $responseStats[$questionId] = [
                'question_type' => $question->type,
                'responses' => [],
                'counts' => [],
                'percentages' => [],
            ];

            // Initialize coutns for mcq, ranking, boolean
            if($question->type === 'mcq'){
                foreach ($question->options as $option){
                    $responseStats[$questionId]['counts'][$option->option] = 0;
                }
            }
            elseif($question->type === 'ranking'){
                for ($i=0; $i <= 5; $i++){
                    $responseStats[$questionId]['counts'][$i] = 0;
                }
            }
            elseif($question->type === 'boolean'){
                    $responseStats[$questionId]['counts']['Yes'] = 0;
                    $responseStats[$questionId]['counts']['No'] = 0;
            }

            // Aggregate responses
            foreach($surveyResponses as $surveyResponse){
                foreach ($surveyResponse->responses as $response){
                    if($response['question_id'] === $questionId){
                        if($question->type === 'short' || $question->type === 'long'){
                            $responseStats[$questionId]['responses'][] = $response['response'];
                        }

                        elseif($question->type === 'mcq'){
//                            dd($response);
                            if (isset($response['response'])) {
                                foreach ((array)$response['response'] as $option) {
                                    if (isset($responseStats[$questionId]['counts'][$option])) {
                                        $responseStats[$questionId]['counts'][$option]++;
                                    }
                                }
                            }
                        }

                        elseif ($question->type === 'ranking') {
                            if (isset($response['response'])) {
                                $value = (int)$response['response'];
                                if (isset($responseStats[$questionId]['counts'][$value])) {
                                    $responseStats[$questionId]['counts'][$value]++;
                                }
                            }
                        }

                        elseif ($question->type === 'boolean') {
                            if($response['response']) {
                                $value = $response['response'] === 'true' || $response['response'] === true ? 'Yes' : 'No';
                                $responseStats[$questionId]['counts'][$value]++;
                            }
                        }
                    }
                }
            }

            // Calculate percentages
            if ($totalResponses > 0) {
                foreach ($responseStats[$questionId]['counts'] as $key => $count) {
                    $responseStats[$questionId]['percentages'][$key] = round(($count / $totalResponses) * 100, 2);
                }
            }
        }


//        dd($survey);

        return view('surveys.show', ['survey' => $survey, 'surveyResponses' => $surveyResponses, 'responseStats' => $responseStats, 'totalResponses' => $totalResponses, 'respondentEmails' => $respondentEmails]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('surveys.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $survey = Survey::findOrFail($id);

        // if user is not authenticated
        if($survey->user_id != auth()->id()){
            abort(403, 'Unauthorized action.');
        }

        foreach ($survey->responses as $response){
            $response->delete();
        }

        $survey->delete();

        session()->flash('error', 'Survey deleted successfully!');

        return redirect('surveys');
    }
}
