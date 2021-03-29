@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="offset-3 col-6 mt-3 ">

        <h1>Write a review for {{ $movie->title }}</h1>

        <form class="mt-5 p-3 formcontainer border border-2 rounded" action="{{ route('page_movie_review_create', ['id' => $movie->id]) }}" method="post">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') border-danger @enderror" name="title" id="title" value="{{ old('title') }}">

                @error('title')
                <div class="text-danger small mt-2">
                    {{ $message }}
                </div>
                @enderror
			</div>
			<div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea rows="6" type="text" class="form-control @error('review') border-danger @enderror" name="review" id="review" value="{{ old('review') }}"></textarea>

                @error('review')
                <div class="text-danger small mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Post review</button>
        </form>
    </div>
@endsection
