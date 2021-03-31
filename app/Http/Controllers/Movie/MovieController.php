<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\AddedMovie;
use App\Models\Movie;
use App\Models\Review;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Review $reviewModel)
    {
        // The id param from URL
        $movieId = $request->id;
        $reviews = DB::table('reviews');
        $movieIsAdded = null;

        // Get movie from DB using ID
        $movie = Movie::where('id', '=', $movieId)->first();

        // Get metadata on movie from TMDB
        $tmdb_meta_response = Http::get("https://api.themoviedb.org/3/movie/" . $movie->tmdb_id . "?api_key=db04754e6a4ab8980172edf96f20adaa");
        $tmdb_meta_result = json_decode($tmdb_meta_response->body());

        // Assign metadata to existing movie object
        foreach ($tmdb_meta_result as $k => $v) {
            $movie->$k = $v;
        }

        // Get credits on movie from TMDB
        $tmdb_credits_response = Http::get("https://api.themoviedb.org/3/movie/" . $movie->tmdb_id . "/credits?api_key=db04754e6a4ab8980172edf96f20adaa");
        $tmdb_credits_result = json_decode($tmdb_credits_response->body());

        // Assign credits data to existing movie object
        foreach ($tmdb_credits_result as $k => $v) {
            $movie->$k = $v;
        }


        // Get review(s) from DB for movie using ID
        $reviewsList = $reviews->where([
            'movie_id' => $movieId,
        ])->get();

        // Default public review list count to 0
        $reviewListCount = 0;

        // If there are reviews attache user_name to review object
        if (count($reviewsList) > 0) {

            foreach ($reviewsList as $review) {
                $userName = DB::table('users')->where('id', '=', $review->user_id)->first();

                // Append username to review
                $review->user_name = $userName->name;

                $review->status = '';
                switch ($review->status_id) {
                    case 1:
                        $review->status = 'pending';
                        break;
                    case 2:
                        $review->status = 'draft';
                        break;
                    case 3:
                        $review->status = 'published';
                        break;
                    case 4:
                        $review->status = 'denied';
                        break;

                    default:
                        $review->status = 'pending';
                        break;
                }

                // Count public reviews
                if ($review->status_id === 3) {
                    $reviewListCount++;
                }
            }
        }

        // Default user has review to false
        $userHasReview = false;

        // Default user review to null
        $userReview = null;

        // If user signed in
        $user = auth()->user();

        if ($user) {
            $userId = $user->id;
            $userName = $user->name;

            // Switch reviews list stdClass (object) to searchable array
            $arrayReviewList = $reviewsList->toArray();

            // Search reviews list for user id
            // Return index if found
            $userReview = array_search($userId, array_column($arrayReviewList, 'user_id'));

            // If array search not false, user has a review
            if ($userReview !== false) {
                // Set user has review to true
                $userHasReview = true;

                // Remove user review from review list
                unset($arrayReviewList[$userReview]);

                // Set user review to seperate review
                $userReview = $reviewsList[$userReview];

                // Reindex review list after unser
                $reviewsList = array_values($arrayReviewList);

                // Subtract 1 from the review list count since if user is viewing we don't need it for general list
                $reviewListCount--;
            }

            // Get method to see if movie is added to watchlist
            $movieIsAdded = $movie->addedBy($user);
        }

        // Return data
        // Use json decode/encode to return object

        // Return object to view with movie and review data
        return view('pages.movie')->with([
            'movie' => $movie,
            'movieIsAdded' => $movieIsAdded,
            'current_user' => $user,
            'year' => substr($movie->year, 0, 4),
            'reviews' => [
                'list' => $reviewsList,
                'list_count' => $reviewListCount,
                'user' => json_decode(json_encode([
                    'hasReview' => $userHasReview,
                    'review' => $userReview,
                ])),
            ],
        ]);
    }
}
