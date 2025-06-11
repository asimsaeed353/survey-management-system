<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->all());
        // Validate session_id and at least one response
        $response = $request->validate([
            'session_id' => 'required|string',
            'responses' => 'required|array',
        ], [
            'session_id.required' => 'Session ID is missing.',
        ]);

        $surveyResponse = SurveyResponse::create([
            'session_id' => $response['session_id'],
            'survey_id' => $request['survey_id'],
            'responses' => $request['responses'],
            'submitted_at' => now(),
        ]);

        $survey = Survey::where('_id', $request['survey_id'])->update(['published' => true]);
//        dd($survey['published']);

//
//        if(!$survey['published']){
//            $survey::update(['published' => true]);
//        }

        return view('publish.published');
//        return 'thank you';

    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey, $slug)
    {
        $survey::with('questions.options');
        $sessionId = Str::uuid()->toString();
        return view('publish.show', ['survey' => $survey, 'sessionId' => $sessionId]);
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
        //
    }
}
