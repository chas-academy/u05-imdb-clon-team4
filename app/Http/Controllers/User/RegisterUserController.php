<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    // Redirect logged in user
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('user.register');
    }

    public function create(Request $request)
    {
        // dd($request);

        // Validate input
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'accept-user-terms' => 'accepted',
        ]);

        // Create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Sign in user
        auth()->attempt($request->only('email', 'password'));

        // Redirect to user page
        return redirect()->route('user_home');
    }
}
