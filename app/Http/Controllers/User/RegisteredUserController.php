<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
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
        $user = auth()->user();

        /*   $id = $request->user()->id;
        $watchlist = AddedMovie::where('id', $id)->get();
        $movies = Movie::whereIn('id', $watchlist)->get(); */

        $added_movies = auth()->user()->addedMovies()->pluck('movie_id');
        $movies = Movie::whereIn('id', $added_movies)->get();

        return view('pages.account')
            ->with([
                'user' => $user,
                'movies' => $movies,
            ]);
    }
}
