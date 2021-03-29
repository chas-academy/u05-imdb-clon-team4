@extends('layouts.default')

@section('content')
	<h1>Hi {{ $user->name }}!</h1>

	{{-- Do we have movies to show --}}
    @if (count($movies) > 0)
		<h2 class="h4 mt-3 mb-4">Here is your watchlist</h2>
		<div class="row g-4 flex-row">

			@include('components.watchlist')
		</div>

	@endif

@endsection
