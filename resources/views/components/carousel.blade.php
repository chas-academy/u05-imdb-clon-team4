<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Feature movie 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Feature movie 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Feature movie 3"></button>
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
            <h3>{{ $movie->title }}</h3>
            <h5>{{ $movie->tagline }}</h5>
            <p class="fs-6">{{ $movie->description }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

</div>
