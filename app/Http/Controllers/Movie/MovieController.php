<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // The id param from URL
        $id = $request->id;
        // Get movie from DB using ID
        $movie = DB::table('movies')->where('id', "=", $id)->first();
        // Get review(s) from DB for movie using ID
        $reviews = DB::table('reviews')->where('movie_id', "=", $id)->get();
        // Get reviews and users from DB
        $reviewsTable = DB::table('reviews');
        $usersTable = DB::table('users');

        dd($movie->image);

        // Postgres DB saves image as BYTEA (HEX decimal) which we need to convert back to base64
        if (env('DB_CONNECTION') === 'pgsql') {
            $movie->image = hex2bin(substr($movie->image, 2));
        }

        // Return movie view with movie and review data
        return view('pages.movie')->with([
            'movie' => $movie,
            'reviews' => [
                'movie' => $reviews,
                'table' => $reviewsTable,
                'users_table' => $usersTable,
            ],
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.movie');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
