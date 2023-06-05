<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
           return  redirect()->route('feed.index');
        } else {
            return back()->with('errorMessage', 'Invalid credentials');
            dd('false');
        }
    }
}
