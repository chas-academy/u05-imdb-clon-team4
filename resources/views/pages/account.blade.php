@extends('layouts.default')

@section('content')
@if(Session::has('delete-message'))
<div class="alert alert-danger message">{{session('delete-message')}}</div>
@include('components.sessionMessage')
@endif
<h1>Hi {{ $user->name }}!</h1>

{{-- Do we have movies to show --}}
@if (count($movies) > 0)
<h2 class="h3 mt-3 mb-4">Here is your watchlist</h2>
<div class="row g-4 flex-row">

    @include('components.watchlist')
</div>
@else
<h2 class="h3 mt-3 mb-4">If you add some movies to your watchlist, they will end up here</h2>

@endif

@if (count($reviews) > 0)
<h2>Here are your reviews</h2>
@foreach($reviews as $review)
@include('components.review-card', ['review' => $review])
@endforeach
@endif
@endsection
