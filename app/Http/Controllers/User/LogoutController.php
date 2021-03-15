<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        // dd('logout');
        auth()->logout();

        return redirect()->route('home');
    }
}
