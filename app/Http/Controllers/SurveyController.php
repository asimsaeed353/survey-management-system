<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $user = Auth::user(); // Get the currently logged in user
//        $surveys= $user->surveys()->orderBy('created_at', 'desc')->get(); // fetch all the surveys belong to that user
//
//        $surveys = $surveys->fresh();

        $surveys = Survey::with('user')->latest()->get();

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

        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'description' => ['string', 'nullable'],
            'questions' => ['required', 'array'],
            'questions.*.type' => ['required', 'string'],
            'questions.*.question' => ['required', 'string'],
            'questions.*.options' => ['sometimes', 'array', 'min:2'],
            'questions.*.options.*' => ['string', 'required', 'min:1'],
            'qFile' => ['image'],
        ]);

        $survey = Survey::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
            'published' => false,
            'responses' => rand(50, 500),
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
//        $surveyResponses = SurveyResponse::where('survey_id', $survey->_id)->get();

//        dd($survey);
//        $surveyResponses = $survey->responses;
//        $results = $surveyResponses->toArray();

        $surveyResponses = SurveyResponse::where('survey_id', $survey->_id)->get();
//        dd($surveyResponses);

//        $responses = [];

//        foreach ($results as $item) {
//            $responses[] = $item['responses'];
//        }

//        dd($responses[0][0]);

//        dd($survey);

        return view('surveys.show', ['survey' => $survey, 'surveyResponses' => $surveyResponses]);
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

        $survey->delete();

        session()->flash('error', 'Survey deleted successfully!');

        return redirect('surveys');
    }
}
