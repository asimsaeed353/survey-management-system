<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently logged in user
        $surveys= $user->surveys()->orderBy('created_at', 'desc')->get(); // fetch all the surveys belong to that user

        $surveys = $surveys->fresh();

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

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|nullable',
            'questions' => 'required|array|min:1',
            'questions.*.type' => 'string|required',
            'questions.*.question' => 'string|required'
        ]);

        $survey = Survey::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
            'published' => true,
            'responses' => rand(50, 500),
        ]);

        foreach ($validated['questions'] as $question){
            Question::create([
                'type' =>  $question['type'],
                'question' => $question['question'],
                'survey_id' => $survey->_id,
            ]);
        }

//        $array = $validated['question'];
//
//
////        Question::createMany([
////            $array,
////            'survey_id' => $survey->_id,
////        ]);
//
//        Question::create([
//            'question' => $array['question0'],
//            'survey_id' => $survey->_id,
//        ]);
//        Question::create([
//            'question' => $array['question1'],
//            'survey_id' => $survey->_id,
//        ]);

        return redirect('surveys');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $survey = Survey::find($id);

//        dd($survey);

        return view('surveys.show', ['survey' => $survey]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

        return redirect('surveys');
    }
}
