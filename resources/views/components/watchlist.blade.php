@extends('layout')
<h1>Watchlist</h1>


@foreach ($movies as $movie)



<h3 class=" title ">{{ $movie->title }}</h3>
<div class="d-flex col">
    <p class="p-2">{{ $movie->year }}</p>
</div>
<div class="col-sm-12 col-md-12 col-lg-6">
    <button type="button" class="btn btn-warning m-2 p-2 col-sm-6 col-lg-2 ">[Rating]</button>
</div>


<section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row  h-auto ">

    <div class="row my-auto col-lg-12">
        <div class="col-lg-5 h-50">
            <img src="{{ $movie->image }}" alt="{{ $movie->title }}" />
        </div>

        <div class="col-sm-12 col-lg-5  h-50">
            <h2 class="mt-2">Storyline</h2>
            <p class="my-5">{{ $movie->description }}</p>
        </div>
    </div>

</section>

@endforeach
