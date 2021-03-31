<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

    <div class="carousel-inner">
        @foreach ($movies as $movie)
            <div class="carousel-item {{ $loop->index === 0 ? 'active' : '' }}" onclick="window.location.href='/movie/{{ $movie->id }}'">
                <img
                src="https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces{{ $movie->backdrop }}"
                class="d-inline-block w-100"
                alt="{{$movie->title}}"
                height="500"
                />
                <div class="carousel-caption d-none d-md-block">
                <h2 class="">{{ $movie->title }}</h2>
                <h3 class="">{{ $movie->tagline }}</h3>
                <p class="fs-6">{{ $movie->description }}</p>
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
