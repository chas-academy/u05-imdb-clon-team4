@extends('layouts.app')

@section('content')
    <h1>Welcome to the IMDB Clone by team 4!</h1>

    {{-- Include carousel --}}
	@include('components.carousel')

    {{-- Include list --}}
    @include('components.list')
@endsection
