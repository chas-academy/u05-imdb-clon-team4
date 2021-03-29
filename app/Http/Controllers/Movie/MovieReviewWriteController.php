<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieReviewWriteController extends Controller
{
    // Make sure user is authenticated
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $movie = DB::table('movies')->where('id', "=", $id)->first();

        return view('pages.review-write')->with([
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get input, verify and store

        // Validate input
        $this->validate($request, [
            'title' => 'required|min:5',
            'review' => 'required|min:5',
        ]);

        $movieId = $request->id;
        $userId = auth()->user()->id;

        // Create review
        $user = Review::create([
            'movie_id' => $movieId,
            'user_id' => $userId,
            'status_id' => 1,
            'title' => $request->title,
            'description' => $request->review,
        ]);

        // Redirect to movie page
        return redirect()->route('page_movie', ['id' => $movieId]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $reviewId = $request->review;
        DB::table('reviews')->delete($reviewId);

        return redirect()->route('page_movie', ['id' => $id]);
    }
}
