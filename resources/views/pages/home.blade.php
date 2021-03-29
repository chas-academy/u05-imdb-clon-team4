@extends('layouts.default')

    @section('content')
        <h1>Welcome to the IMDB Clone by team 4!</h1>

        {{-- Include carousel --}}
        {{-- @include('components.carousel') --}}

        {{-- Do we have movies to show --}}
        @if (count($movies) > 0)
            <h2 class="mt-3 mb-4 h3">Some movies to check out</h2>
	        <div class="row g-4 flex-column flex-wrap flex-md-row flex-md-nowrap justify-content-evenly align-content-around">
				{{-- Loop movies, stop on COUNT_MOVIES or max 5 --}}
				@for($i = 0; $i < count($movies) && $i < 5; $i++)
					<div class="col movie-cards-col">
						{{-- Include cards --}}
                		@include('includes.cards', ['movies' => $movies])
					</div>
				@endfor
            </div>
        @endif

@endsection
