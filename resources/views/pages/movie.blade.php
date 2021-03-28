@extends('layouts.default')

@section('content')
<div class="  d-flex flex-column g-3 justify-content-evenly col-lg-10 mx-auto gy-4">

    <section class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-lg-12 d-lg-flex flex-row row">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h1 class=" title h2">{{ $movie->title }}</h1>
				<p class="subtitle">{{ $movie->year }}</p>
			</div>
            <div class="col-sm-12 col-md-12 col-lg-6">
				<button type="button" class="btn btn-primary mb-2 p-2 col-sm-6 col-lg-6">
					<i class="fa fa-plus mx-2" style="pointer-events: none;"></i>
					Add to watchlist
				</button>
            </div>
        </div>
    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row h-auto mb-3">
		<div class="row py-2">
            <div class="col-lg-6 mb-3" style="object-fit: contain;">
                <img src=" {{ $movie->image }}" alt="{{ $movie->title }}" class=" img-fluid" />
            </div>
			<div class="col-sm-12 col-lg-4 ml-8">
                <h2 class="">Storyline</h2>
                <p class="my-2">{{ $movie->description }}</p>
            </div>
        </div>
	</section>

    <section class="col-lg-12">
            <div class="row">
                {{-- Registered and authenticated users can write a review --}}
                @auth
                    {{-- If logged in user hasn't written a review, suggest they do --}}
                    @if (!$reviews['user']->hasReview)
					<div class="col-sm-12 col-md-12 col-lg-6">
                        <a class="btn btn-burnt-maroon mb-2 p-2 col-sm-6 col-lg-6 text-silver" href="{{ route('page_movie_review_create', $movie->id) }}">Write review</a>
					</div>
                    @else

                    @if ($reviews['user']->review->status === 'pending')
                        <h4>Your review is pending.</h4>
                    @endif

                    @if ($reviews['user']->review->status === 'draft')
                        <h4>Your review is a draft.</h4>
                    @endif

                    @if ($reviews['user']->review->status === 'published')
                        <h4>Your review</h4>
                    @endif

                    @if ($reviews['user']->review->status === 'denied')
                        <h4>Your review was denied.</h4>
                    @endif

                    @include('components.review-card', ['review' => $reviews['user']->review])
                        <form class="p-3" action="{{ route('page_movie', ['id' => $movie->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="review" value="{{ $reviews['user']->review->id }}">

                            <button type="submit" class="btn logbtn">
                                Delete review
                            </button>
                        </form>
                    @endif
                @endauth

                {{-- Make sure we have reviews --}}
                @if ($reviews['list_count'] > 0)

                <h3 class="title mt-3">User reviews</h3>
                <div class="row row-cols-1 row-cols-lg-2 g-4 mt-0">
                    @for($i = 0; $i < $reviews['list_count'] && $i < 5; $i++) @if ($reviews['list'][$i]->status ===
                        'published')
                        @include('components.review-card', ['review' => $reviews['list'][$i]])
                        @endif
                        @endfor

                        @else

                        @guest
                        <p class="mt-3 h3">There are currently no reviews for {{ $movie->title }}</p>

                        <p>
                            <a href="{{ route('user_login') }}">Login</a> or <a href="{{ route('user_create') }}">Create Account</a> to write a review
                        </p>
                        @endguest

                        @endif
                </div>
            </div>
    </section>
</div>
@endsection
