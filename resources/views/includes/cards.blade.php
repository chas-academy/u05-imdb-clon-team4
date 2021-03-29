<div class="col movie-cards-col">
    <a href="movie/{{ $movies[$i]->id }}" class="card p-0 border-0 rounded-0 h-100">
        <img class="card-img-top rounded-0" src="{{ $movies[$i]->image }}" alt="{{ $movies[$i]->title }}">
        <div class="card-body rounded-0">
            <h3 class="card-title h5">{{ $movies[$i]->title }}</h2>
            <p class="card-subtitle mb-2 text-muted h6">{{ substr($movies[$i]->year, 0, 4) }}</p>
        </div>
    </a>
</div>
