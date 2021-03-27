@extends('layouts.default')

@section('content')
<div class="  d-flex flex-column g-0 justify-content-evenly col-lg-10 mx-auto">

    <section class="col-sm-12 col-md-12 col-lg-12 ">
        <div class="col-lg-12 d-lg-flex flex-row row  ">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h3 class=" title ">{{ $movie->title }}</h3>

                    <p class="p-2 subtitle">{{ $movie->year }}</p>

            </div>

                <form action="{{route('add_to_watchlist', $movie->id)}}" method="POST">
                        @csrf
                    <button type="button" class="btn btn-primary m-2 p-2 col-sm-6 col-lg-6"><i class="fa fa-plus mx-2"
                        style=" pointer-events: none;"></i>Add to watchlist</button>
                </form>

        </div>
    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row  h-auto ">

        <div class="row mb-5 py-2 ">
            <div class="col-lg-6" style=" object-fit: contain;">
                <img src=" {{ $movie->image }}" alt="{{ $movie->title }}" class="rounded img-fluid" />
            </div>

            <div class="col-sm-12 col-lg-4 ml-8">
                <h2 class="mt-2">Movie Description</h2>
                <p class="my-5">{{ $movie->description }}</p>
            </div>
        </div>

    </section>

    <section class="col-lg-10 mx-auto">
        <div class="container">
            <div class="row">
                {{-- Registered and authenticated users can write a review --}}
                @auth
                    {{-- If logged in user hasn't written a review, suggest they do --}}
                    @if(!$reviews['user']->hasReview)
                        <a href="{{ route('page_movie_review_create', $movie->id) }}">
                            <h4 class="mt-3">Write review</h4>
                        </a>
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

                <h1 class="title text-center">User reviews</h1>
                <div class="card-body d-flex flex-column">
                    @for($i = 0; $i < $reviews['list_count'] && $i < 5; $i++) @if ($reviews['list'][$i]->status ===
                        'published')
                        @include('components.review-card', ['review' => $reviews['list'][$i]])
                        @endif
                        @endfor

                        @else

                        @guest
                        <h3 class="mt-3">There are currently no reviews for {{ $movie->title }}</h3>

                    <p>
                        <a href="{{ route('user_login') }}">Login</a> or <a
                            href="{{ route('user_create') }}">Create
                            Account</a> to write a review
                    </p>
                @endguest

                        @endif
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection
