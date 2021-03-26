<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
use Illuminate\Http\Request;

class AddedMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Movie $movie)
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddedMovie  $addedMovie
     * @return \Illuminate\Http\Response
     */
    public function edit(AddedMovie $addedMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddedMovie  $addedMovie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddedMovie $addedMovie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddedMovie  $addedMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddedMovie $addedMovie)
    {
        //
    }
}
