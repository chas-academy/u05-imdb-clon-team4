{{-- Do we have movies to show --}}
@if (count($movies) > 0)
  <div class="d-flex flex-column align-items-center card-container">
    <h2 class="text-center mt-3">Other content below</h2>
    <div class="container row p-2 gx-5">
      {{-- Loop movies, stop on COUNT_MOVIES or max 5 --}}
      @for($i = 0; $i < count($movies) && $i < 5; $i++)
      <a href="movie/{{ $movies[$i]->id }}" class="card text-dark bg-light col m-3" style="max-width: 18rem;">
          <div class="card-header">{{ $movies[$i]->title }}</div>
          <div class="card-body">´
            <h5 class="card-title">Light card title</h5>
            <p class="card-text">{!! $movies[$i]->description !!}</p>
          </div>
        </a>
      @endfor
    </div>
  </div>
@endif