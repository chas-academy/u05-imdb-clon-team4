<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        @foreach ($movies as $movie)
            <div class="item{{ $loop->index === 0 ? " active" : "" }}" onclick="window.location.href='/movie/{{ $movie->id }}'">
                <img
                src="https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces{{ $movie->backdrop }}"
                class="d-inline-block w-100"
                alt="{{$movie->title}}"
                height="500"
                />
                <div class="carousel-caption d-none d-md-block">
                <h2>{{ $movie->title }}</h2>
                <h3>{{ $movie->tagline }}</h3>
                <p>{{ $movie->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <a
    class="left carousel-control"
    role="button"
    href="#carouselExampleCaptions"
    data-slide="prev"
    >
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a
        class="right carousel-control"
        role="button"
        href="#carouselExampleCaptions"
        data-slide="next"
    >
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
