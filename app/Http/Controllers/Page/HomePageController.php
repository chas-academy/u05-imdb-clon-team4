<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $movies = DB::table('movies')->get();
        return view('pages.home')->with([
            'movies' => $movies,
        ]);
    }
}
