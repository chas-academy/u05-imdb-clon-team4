<h2 class="mt-3 mb-4">Top new picks</h2>
	<div class="row gx-4 flex-nowrap">
	{{-- Loop movies, stop on COUNT_MOVIES or max 5 --}}
	@for($i = 0; $i < count($movies) && $i < 5; $i++)
		<div class="col">
			<a href="movie/{{ $movies[$i]->id }}" class="card p-0 border-0 rounded-0">
				<img class="card-img-top rounded-0" src="{{ $movies[$i]->image }}" alt="{{ $movies[$i]->title }}">
				<div class="card-body rounded-0">
					<h3 class="card-title h5">{{ $movies[$i]->title }}</h2>
					<p class="card-subtitle mb-2 text-muted h6">{{ $movies[$i]->year }}</p>
				</div>
			</a>
		</div>
	@endfor
</div>
