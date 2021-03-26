<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class AddedMovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*   $id = $request->user()->id;
    $movies = AddedMovie::where('id', $id)->get();

    return redirect()->route('user_home', ['movies' => $movies]); */
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

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddedMovie  $addedMovie
     * @return \Illuminate\Http\Response
     */
    public function show(AddedMovie $addedMovie)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddedMovie  $addedMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddedMovie $addedMovie, Movie $movie, Request $request)
    {
        dd($movie);
    }
}
