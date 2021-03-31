<a href="movie/{{ $movies[$i]->id }}" class="card p-0 border-0 rounded-0">
    <div class="row g-0">
        <div class="col-4 col-md-3 col-lg-12">
            <img class="card-img rounded-0" src="{{ $movies[$i]->image }}" alt="{{ $movies[$i]->title }}">
        </div>
        <div class="col-8 col-md-9 col-lg-12">
            <div class="card-body rounded-0">
                <h3 class="card-title h5">{{ $movies[$i]->title }}</h2>
                <p class="card-subtitle mb-2 text-muted h6">{{ substr($movies[$i]->year, 0, 4) }}</p>
            </div>
        </div>
    </div>
</a>
