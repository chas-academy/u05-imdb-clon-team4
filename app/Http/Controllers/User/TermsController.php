<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        // dd($slug);
        // $test = Test::whereSlug($slug)->firstOrFail();
        // return view('user.terms', compact('test'));
        // return view('user.terms');

        return view('pages.terms');
    }
}
