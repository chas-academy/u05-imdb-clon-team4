@extends('layouts.default')

@section('content')
@if(Session::has('add-message'))
    <div class="alert alert-success message">{{session('add-message')}}</div>
@include('components.sessionMessage')
@endif
<div class="d-flex flex-column g-3 justify-content-evenly col-lg-10 mx-auto gy-4">

    <section class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-lg-12 d-lg-flex flex-row row">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h1 class="title">{{ $movie->title }}</h1>
                <h2 class="subtitle text-silver h5 mb-4">{{ $year }}</h2>
            </div>
                @if($current_user && !$movieIsAdded)
                <form action="{{route('add_to_watchlist', $movie->id)}}" method="POST" class="col-sm-6 col-lg-6 mb-2 p-2 d-flex align-items-center">
                    @csrf
                    <button type="submit" name="button" class="btn btn-primary" onclick="timeout()">
                        <i class="fa fa-plus mx-2" style=" pointer-events: none;"></i>
                        Add to watchlist
                    </button>
                </form>
                @elseif($current_user && $movieIsAdded)
                    <div class="col-sm-6 col-lg-6 mb-2 p-2 d-flex align-items-center">
                         <button type="button" name="button" class="btn btn-primary">
                     <i class="fa fa-plus mx-2" style=" pointer-events: none;"></i>
                    Already added to watchlist</button>
                    </div>
                @endif
        </div>
    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row h-auto mb-3">
        <div class="row py-2">
            <div class="col-lg-6 mb-3" style="object-fit: contain;">
                <img src="https://www.themoviedb.org/t/p/w300_and_h450_bestv2/{{ $movie->poster_path }}" alt="{{ $movie->title }}" class=" img-fluid" />
            </div>
            <div class="col-sm-12 col-lg-4 ml-8">
                <h2 class="">Storyline</h2>
                <p class="my-2">{{ $movie->description }}</p>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Studios</td>
                            <td>
                                @foreach ($movie->production_companies as $company)
                                    <span>{{ $company->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Tagline</td>
                            <td>
                                {{ $movie->tagline }}
                            </td>
                        </tr>
                        <tr>
                            <td>Runtime</td>
                            <td>
                                {{ floor($movie->runtime / 60) }}h {{ $movie->runtime - floor($movie->runtime / 60) * 60 }}min
                            </td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td>
                                {{ $movie->budget }}
                            </td>
                        </tr>
                        <tr>
                            <td>Revenue</td>
                            <td>
                                {{ $movie->revenue }}
                            </td>
                        </tr>
                        <tr>
                            <td>Popularity</td>
                            <td>
                                {{ $movie->popularity }}
                            </td>
                        </tr>
                        <tr>
                            <td>Spoken languages</td>
                            <td>
                                @foreach ($movie->spoken_languages as $language)
                                    <span>{{ $language->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="width: 50vw; display: flex; overflow: auto; margin-top: 10px;">
                    @foreach ($movie->cast as $actor)
                        <div>
                            <img style="border-radius: 15px; margin-right: 10px;" src="https://www.themoviedb.org/t/p/w138_and_h175_face{{$actor->profile_path}}" alt="">
                            <h4>{{ $actor->name }}</h4>
                            <h4>{{ $actor->character }}</h4>
                            <h4>{{ $actor->popularity }}</h4>
                            <h4>{{ $actor->gender === 2 ? "male" : "female"}}</h4>
                        </div>
                    @endforeach
                </div>

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
