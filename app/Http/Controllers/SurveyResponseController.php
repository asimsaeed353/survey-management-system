<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use MongoDB\BSON\ObjectId;

class SurveyResponseController extends Controller
{

    /**
     * Store a newly created survey response in storage.
     */
    public function store(Request $request)
    {
        // Basic validation to ensure required fields are present
        $response = $request->validate([
            'session_id' => 'required|string',
            'survey_id' => 'required',
            'email' => 'required|email',
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
            'survey_id' => $survey->_id,
            'created_by' => $survey->user_id,
            'respondent_email' => $request->input('email'),
            'responses' => $request->input('responses'),
            'submitted_at' => now(),
        ]);

        // Invalidate session for this survey ( removes sessionKey and sessionId from session() to prevent duplicate responses )
//        session()->forget($sessionKey);


        return view('publish.published');

    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey, $slug)
    {
        $sessionId = Str::uuid()->toString();

        // Eager load survey questions and options
        $survey->with('questions.options');

        // Session-based $sessionId
        // Use a unique session id for this survey
        $sessionKey = 'survey_session_' . $survey->_id;

        // Generate a 32-character string and store it in session
        if(!session()->has($sessionKey)){
            session()->put($sessionKey, Str::random(32));
        }

        //  retrieve sessionId from session to maintain consistency across requests
        $sessionId = session($sessionKey);

       // Submission check
        $hasSubmitted = SurveyResponse::where('survey_id', $survey->_id)
        ->where('session_id', $sessionId)
        ->exists();

        // If user has submitted response, redirect them to already submitted view to prevent duplicate submission
        if ($hasSubmitted){
            return view('publish.responded', ['survey' => $survey]);
        }

        return view('publish.show', ['survey' => $survey, 'sessionId' => $sessionId]);
    }

    public function checkEmail(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email',
            'survey_id' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    try {
                        new ObjectId($value);
                    } catch (\Exception $e) {
                        $fail('The survey ID is invalid.');
                    }
                },
            ],
        ]);

        try {
            // Normalize email to avoid mismatches
            $email = strtolower(trim($validated['email']));
            $surveyId = ($validated['survey_id']);

            // Query survey_responses collection
            $exists = SurveyResponse::where('respondent_email', $email)
                ->where('survey_id', $surveyId)
                ->exists();

            // Log for debugging
//            Log::debug('Checking email', [
//                'email' => $email,
//                'survey_id' => (string) $surveyId,
//                'exists' => $exists,
//            ]);

            // Return JSON response
            return response()->json([
                'exists' => $exists,
                'message' => $exists ? 'This email has already submitted a response for this survey.' : ''
            ]);
        } catch (\Exception $e) {
            Log::error('Email check failed: ' . $e->getMessage(), [
                'email' => $validated['email'],
                'survey_id' => $validated['survey_id']
            ]);
            return response()->json([
                'exists' => false,
                'message' => 'Error checking email.'
            ], 500);
        }
    }
}
