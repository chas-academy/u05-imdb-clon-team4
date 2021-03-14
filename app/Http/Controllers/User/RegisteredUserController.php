<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    // Use construct to check if user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        return view('user.index');
    }
}
