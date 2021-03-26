@extends('layouts.default')

@section('content')
<div class=" d-flex flex-column g-0 justify-content-evenly col-lg-10 mx-auto h ">

    <section class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-lg-12 d-lg-flex flex-row row ">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h3 class=" title ">{{ $movie->title }}</h3>
                <div class="d-flex col">
                    <p class="p-2">{{ $movie->year }}</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <button type="button" class="btn btn-warning m-2 p-2 col-sm-6 col-lg-2 ">[Rating]</button>
                <form action="{{route('add_to_watchlist', $movie->id)}}" method="POST">
                    @csrf
                    <button type="submit" name="button" class="btn btn-primary m-2 p-2 col-sm-6 col-lg-4">[Add movie to list]</button>
                </form>
            </div>
        </div>
    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row  h-auto ">

        <div class="row my-auto col-lg-12">
            <div class="col-lg-5 h-50">
                <img src="{{ $movie->image }}" alt="{{ $movie->title }}" />
            </div>

            <div class="col-sm-12 col-lg-5  h-50">
                <h2 class="mt-2">Storyline</h2>
                <p class="my-5">{{ $movie->description }}</p>
            </div>
        </div>

    </section>

    <section id="reviews">
        <div class="container">
            <div class="row">
                {{-- Registered and authenticated users can write a review --}}
                @auth
                    {{-- If logged in user hasn't written a review, suggest they do --}}
                    @if (!$reviews['user']->hasReview)
                        <a href="{{ route('page_movie_review_create', $movie->id) }}"><h4 class="mt-3">Write review</h4></a>
                    @else
                        @if ($reviews['user']->review->status === 'pending')
                            <h4>Your review is currently pending.</h4>
                        @endif
                        @if ($reviews['user']->review->status === 'denied')
                            <h4>Your review was denied.</h4>
                        @endif
                        @if ($reviews['user']->review->status === 'public')
                            <h3>Your review</h3>
                            @include('components.review-card', ['review' => $reviews['user']->review])
                        @endif
                        <form
                            class="p-3 formcontainer border border-2 rounded"
                            action="{{ route('page_movie', ['id' => $movie->id]) }}"
                            method="post"
                        >
                            @csrf
                            <input type="hidden" name="review" value="{{ $reviews['user']->review->id }}">
                            <button type="submit" class="btn logbtn">
                                Delete review
                            </button>
                        </form>
                    @endif
                @endauth

                {{-- Make sure we have reviews --}}
                @if (count($reviews['list']) > 0)

                    <h1 class="title">User reviews</h1>

                    @for($i = 0; $i < count($reviews['list']) && $i < 5; $i++)
                        @if ($reviews['list'][$i]->status === 'public')
                            @include('components.review-card', ['review' => $reviews['list'][$i]])
                        @endif
                    @endfor

                @else

                    @guest
                        <h3 class="mt-3">There are currently no reviews for {{ $movie->title }}</h3>

                        <p>
                            <a href="{{ route('user_login') }}">Login</a> or <a href="{{ route('user_create') }}">Create Account</a> to write a review
                        </p>
                    @endguest

                @endif
               {{--  <span>{{$movie->addedMovie()}}</span> --}}
            </div>
        </div>
    </section>
</div>
@endsection
