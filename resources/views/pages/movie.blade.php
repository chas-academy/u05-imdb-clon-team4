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
                <button type="button" class="btn btn-primary m-2 p-2 col-sm-6 col-lg-4">[Add movie to list]</button>
            </div>
        </div>
    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row  h-auto ">

        <div class="row my-auto col-lg-12">
            <div class="col-lg-5 h-50">
                <img src="/{{ $movie->image }}" class="thumbnail">
            </div>

            <div class="col-sm-12 col-lg-5  h-50">
                <h2 class="mt-2">Storyline</h2>
                <p class="my-5">{{ $movie->description }}</p>
            </div>
        </div>

    </section>

    <section id="reviews">
        <div class="container">
                {{-- Setup some variables --}}
                @php
                    $user = auth();
                    $id = $user->id();
                    $userReview = $reviews['table']->where('user_id', "=", $id)->first();
                    $reviewers = $reviews['movie'];
                @endphp

                {{-- Registered and authenticated users can write a review --}}
                @auth
                    
                    {{-- If logged in user hasn't written a review, suggest they do --}}
                    @if (!$userReview)
                        <a href="{{ route('page_movie_review_create', $movie->id) }}"><h4 class="mt-3">Write review</h4></a>
                    @endif
                @endauth

                {{-- Make sure we have reviews --}}
                @if (count($reviewers) > 0)
                
                <h1 class="title">User reviews</h1>
            
                    @for($i = 0; $i < count($reviewers) && $i < 5; $i++)
                        @php
                            $reviewerName = $reviews['users_table']->where('id', "=", $reviewers[$i]->user_id)->get()[0]->name;
                        @endphp
                        <div class="card-body d-flex">
                            <div class="card mx-2 ">
                                <h3 class="card-header ">{{ $reviewers[$i]->title }}</h3>
                                <div class="card-body">
                                    <p>Reviewer: {{ $reviewerName }}</p>
                                    <p class="card-text">{!! $reviewers[$i]->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                        
                @else

                    @guest
                        <h3 class="mt-3">There are currently no reviews for {{ $movie->title }}</h3>
                        
                        <p>
                            <a href="{{ route('user_login') }}">Login</a> or <a href="{{ route('user_create') }}">Create Account</a> to write a review
                        </p>
                    @endguest

                @endif
        </div>
    </section>
</div>
@endsection