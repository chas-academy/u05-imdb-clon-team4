@extends('layouts.default')

    @section('content')
        <h1>Welcome to the IMDB Clone by team 4!</h1>

        {{-- Include carousel --}}
        {{-- @include('components.carousel') --}}

        {{-- Do we have movies to show --}}
        @if (count($movies) > 0)
            {{-- Include cards --}}
            <h2 class="mt-3 mb-4">Some movies to check out</h2>
	        <div class="row gx-4 flex-nowrap">
                @include('includes.cards', ['movies' => $movies])
            </div>
        @endif

@endsection
