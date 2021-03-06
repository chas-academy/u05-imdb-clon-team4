<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddedMovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Movie $movie)
    {
        if ($movie->addedBy($request->user())) {
            return response(null, 409);
        }

        $movie->addedMovies()->create([
            'user_id' => $request->user()->id,
            'movie_id' => $movie->id,
        ]);
        session()->flash('add-message', "The movie was added to your watchlist");

        return back();
    }

    public function destroy(Movie $movie, Request $request)
    {
        $request->user()->addedMovies()->where('movie_id', $movie->id)->delete();
        session()->flash('delete-message', "The movie has been removed");

        return back();
    }
}
