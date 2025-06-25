<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

        // Basic validation to ensure required fields are present
        $response = $request->validate([
            'session_id' => 'required|string',
            'survey_id' => 'required',
            'responses' => 'required|array',
        ]);

        // Find sessionId
        $survey = Survey::findOrFail($request->input('survey_id'));
        $sessionId = $request->input('session_id');
        $sessionKey = 'survey_session_' . $survey->_id;

        // Check for prior submission
        $hasSubmitted = SurveyResponse::where('survey_id', $survey->_id)
            ->where('session_id', $sessionId)
            ->exists();

        if($hasSubmitted){
            return view('publish.submitted', ['survey' => $survey]);
        }

        // Verify session_id matched the session
        if($sessionId !== session($sessionKey)){
//            return redirect()->back()->withErrors(['session_id' => 'Invalid session. Please try again!']);
            return view('publish.invalid');
        }

        $surveyResponse = SurveyResponse::create([
            'session_id' => $sessionId,
            'ip_address' => $request->ip(),
            'survey_id' => $survey->_id,
            'created_by' => $survey->user_id,
            'responses' => $request->input('responses'),
            'submitted_at' => now(),
        ]);

        // Invalidate session for this survey ( removes sessionKey and sessionId from session() to prevent duplicate responses )
        session()->forget($sessionKey);


        return view('publish.published');

    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey, $slug)
    {
//        /*
        // Failed Logic
//        $survey::with('questions.options');
        $sessionId = Str::uuid()->toString();
//        */

        // Eager load survey questions and options
        $survey->with('questions.options');

        // Session-bases $sessionId
        // Use a unique session id for this survey
        $sessionKey = 'survey_session_' . $survey->_id;

        // Generate a 32-character string and store it in session
        if(!session()->has($sessionKey)){
            session()->put($sessionKey, Str::random(32));
        }

        //  retrieve sessionId from session to maintain consistency across requests
        $sessionId = session($sessionKey);

//        // Submission check
//        $hasSubmitted = SurveyResponse::where('survey_id', $survey->_id)
//        ->where('session_id', $sessionId)
//        ->exists();
//
//        // If user has submitted response, redirect them to already submitted view to prevent duplicate submission
//        if ($hasSubmitted){
//            return view('publish.submitted', ['survey' => $survey]);
//        }

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
