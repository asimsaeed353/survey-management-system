<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.signup');
    }

    public function store()
    {
        $userAttributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create(@$userAttributes);

        Auth::login($user);

        return redirect('/dashboard');

    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();

        return view('user.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find user with the given id
        $user = User::find($id);

        // Check if user exists or not
        if(!$user){
            return redirect()->back()->with('error', 'User not found');
        }

        // If user exists
        $validAttributes = $request->validate([
            'name' => [ 'nullable'],
            'email' => ['email', 'nullable'],
            'password' => ['nullable', 'confirmed']
        ]);

        if(!empty($validAttributes['name'])){
            $user->name = $validAttributes['name'];
        }

        if(!empty($validAttributes['email'])){
            $user->email = $validAttributes['email'];
        }

        if(!empty($validAttributes['password'])){
            $user->password = $validAttributes['password'];
        }

        $user->save();

        return redirect('/profile')->with('success', 'User is Updated');
    }
}
