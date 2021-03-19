@extends('layouts.default')

@section('content')
    <h1>Welcome to the IMDB Clone by team 4!</h1>

    {{-- Include carousel --}}
	@include('components.carousel')

    {{-- Include cards --}}
    @include('includes.cards')
@endsection
