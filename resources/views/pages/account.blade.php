@extends('layouts.default')

@section('content')
@if(Session::has('delete-message'))

<div class="alert alert-danger message">{{session('delete-message')}}</div>
@include('components.session-message')
@endif
	<h1 class="my-4">Hello {{ $user->name }}, this is your page!</h1>

<!-- <div class=" d-sm-flex  col-lg-12 flex-lg-row "> -->
<div class="row">
	<div class="col-8">
    {{-- Do we have movies to show --}}
    @if (count($movies) > 0)

    <!-- <div class=" row col-lg-9 col-sm-12 mb-4 flex-lg-wrap  flex-lg-row  flex-sm-column flex-sm-nowrap  "> -->
        <!-- <h3 class= "card-header mb-3 bg-primary">{{ $user->name }} Watchlist</h3> -->
		<h2 class="h3 mt-3 mb-4">Here is your watchlist</h2>
		<div class="row g-4 flex-column flex-wrap flex-lg-row justify-content-evenly align-content-around">
        	@include('components.watchlist')
		</div>
    <!-- </div> -->
    @else
    	<h2 class="h3 mt-3 mb-4">If you add some movies to your watchlist, they will end up here</h2>

    @endif
	</div>
	<div class="col-4">
    @if (count($reviews) > 0)
		<h2 class="h3 mt-3 mb-4">Your reviews</h2>
    <!-- <div class="movie-card  col-lg-3 col-sm-12 mr-3"> -->
        <!-- <h3 class="card-header d-flex justify-content-between mb-3 bg-secondary">
            <span class=" title fs-3"> Your Reviews </span>
            <span class="subtitle fs-3 text-muted"> Status</span>
        </h3> -->

        <ul class="list-group list-group-flush rounded-3">
            @foreach($reviews as $review)
            	@include('components.review-account', ['review' => $review])
            @endforeach
        </ul>
    <!-- </div> -->
    @endif
	</div>
<!-- </div> -->
</div>
@endsection
