@extends('layouts.default')

@section('content')

@if(Session::has('delete-message'))
<div class="alert alert-danger message">{{session('delete-message')}}</div>
@include('components.session-message')
@endif

<h1 class="my-4">Hello {{ $user->name }}, this is your page</h1>

<div class="row">
    <div class="col-8">
    {{-- Do we have movies to show --}}
    @if (count($movies) > 0)
        <h2 class="h3 mt-3 mb-4">Your watchlist</h2>
        <div class="row g-4 flex-column flex-wrap flex-lg-row justify-content-evenly align-content-around">
            @include('components.watchlist')
        </div>
    @else
        <h2 class="h3 mt-3 mb-4">Go ahead and add some movies to your watchlist!</h2>
    @endif
    </div>

    <div class="col-4">
    {{-- Do we have reviews to show --}}
    @if (count($reviews) > 0)
        <h2 class="h3 mt-3 mb-4">Your reviews</h2>
            @foreach($reviews as $review)
                @include('components.review-account', ['review' => $review])
            @endforeach
	@else
		<h2 class="h3 mt-3 mb-4">You have no reviews</h2>
    @endif
    </div>
</div>

@endsection
