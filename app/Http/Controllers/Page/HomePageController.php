<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $movies = DB::table('movies')->get();
        $latestMovies = $movies->sortByDesc("created_at")->slice(0, 3)->map(function ($movie) {
            $response = Http::get("https://api.themoviedb.org/3/movie/" . $movie->tmdb_id . "?api_key=db04754e6a4ab8980172edf96f20adaa");
            $result = json_decode($response->body());
            $movie->backdrop = $result->backdrop_path;
            $movie->tagline = $result->tagline;
            return $movie;
        });

        return view('pages.home')->with([
            'latestMovies' => $latestMovies,
            'movies' => $movies,
        ]);
    }
}
