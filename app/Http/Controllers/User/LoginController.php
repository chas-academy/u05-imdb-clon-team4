<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function store(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Sign in user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login credentials');
        }

        // Redirect to routed page or user home page as default
        return redirect()->intended(route('user_home'));
    }
}
