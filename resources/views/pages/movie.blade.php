@extends('layouts.default')

@section('content')
@if(Session::has('add-message'))
    <div class="alert alert-success message">{{session('add-message')}}</div>
@include('components.sessionMessage')
@endif
<div class="d-flex flex-column justify-content-evenly col-lg-12 col-sm-12 mx-auto">

   
        <div class="col-lg-12 col-sm-12  d-lg-flex flex-row  bg-tundora rounded-top d-flex justify-content-between">
            <div class="align-self-end p-2">
                <h1 class="card-title m-0 text-alto">{{ $movie->title }} <span> </span></h1>
                <h2 class="card-subtitle  fs-5 fst-italic text-silver my-3">{{ $year }}</h2>
            </div>
                @if($current_user && !$movieIsAdded)
                <form action="{{route('add_to_watchlist', $movie->id)}}" method="POST" class="align-self-end m-2 mb-2">
                    @csrf
                    <button type="submit" name="button" class="btn btn-red-devil my-3 p-2" onclick="timeout()">
                        <i class="fa fa-plus mx-2" style=" pointer-events: none; "></i>
                        Add to watchlist
                    </button>
                </form>
                @elseif($current_user && $movieIsAdded)
                   <div class="align-self-end m-2">
                         <button type="button" name="button" class="btn btn-red-devil disabled my-3 p-2">
                     <i class="fa fa-check mx-2" style=" pointer-events: none; "></i>
                    Already added to watchlist</button>
                    </div>
                @endif
        </div>
  

    <section class="col-sm-12 col-md-12 d-lg-flex flex-row h-auto mb-3">
        <div class="row py-2">
            <div class="col-lg-6   mb-3" style="object-fit: contain;">
                <img src=" {{ $movie->image }}" alt="{{ $movie->title }}" class="col-sm-12  rounded img-fluid" />
            </div>
            
            <div class="col-sm-12 col-lg-6 ">
                <h2 class="text-center">Storyline</h2>
                <p class="my-3 mb-3">{{ $movie->description }}</p>
                      
        {{-- Registered and authenticated users can write a review --}}
        @auth
            {{-- If logged in user hasn't written a review, suggest they do --}}
            @if (!$reviews['user']->hasReview)
                <div class="col-sm-12  col-lg-12 justify-content-end">
                    <a class="btn btn-burnt-maroon mb-2 p-2 col-sm-6 col-lg-6 text-silver" href="{{ route('page_movie_review_create', $movie->id) }}">Write review</a>
                </div>
            @else

                @if ($reviews['user']->review->status === 'pending')
                    <h3 class="h5 fst-italic">Your review is pending</h3>
                @endif

                @if ($reviews['user']->review->status === 'draft')
                    <h3 class="h5 fst-italic">Your review is a draft</h3>
                @endif

                @if ($reviews['user']->review->status === 'published')
                    <h3 class="h5 fst-italic">Your review</h3>
                @endif

                @if ($reviews['user']->review->status === 'denied')
                    <h3 class="h5 fst-italic">Your review was denied.</h3>
                @endif

                {{-- User's review --}}
                    <div class="row row-cols-1 g-4 mt-0">
                        @include('components.review-card', ['review' => $reviews['user']->review])
                    </div>

                {{-- Button to remove user's review --}}
                    <form class="py-3" action="{{ route('page_movie', ['id' => $movie->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="review" value="{{ $reviews['user']->review->id }}">
                        <button type="submit" class="btn btn-burnt-maroon text-silver">
                            Delete review
                        </button>
                    </form>
            @endif
        @endauth
            
        </div>
            </div>
          
  
    </section>

    <section class="col-lg-12">
        <div class="row">
        {{-- Make sure we have reviews --}}
        @if ($reviews['list_count'] > 0)
            <h3 class="title mt-3">User reviews</h3>
            <div class="row row-cols-1 row-cols-lg-2 g-4 mt-0">
                @for($i = 0; $i < $reviews['list_count'] && $i < 5; $i++)
                    @if ($reviews['list'][$i]->status === 'published')
                        @include('components.review-card', ['review' => $reviews['list'][$i]])
                    @endif
                @endfor
            </div>
        @else

            <p class="mt-3 h3">There are currently no reviews for {{ $movie->title }}</p>

            @guest
            <p>
                <a class="fw-bold" href="{{ route('user_login') }}">Login</a> or <a class="fw-bold"href="{{ route('user_create') }}">Create Account</a> to write a review
            </p>
            @endguest

        @endif
        </div>
    </section>
</div>
@endsection
