<a href="movie/{{ $movies[$i]->id }}" class="card p-1 border-0 col-sm-12 rounded-3 h-100">
    <img class="card-img-top rounded-3" src="{{ $movies[$i]->image }}" alt="{{ $movies[$i]->title }}">
    <div class="card-body rounded-3">
        <h3 class="card-title fs-6">{{ $movies[$i]->title }}</h2>
        
        
    </div>
    <p class="card-subtitle mb-2 text-center text-muted h6 col-12">{{ substr($movies[$i]->year, 0, 4) }}</p>
    <div class="card-footer ">
     		<form action="{{route('remove_from_watchlist', $movies[$i]->id)}}" method="post" >
        		@csrf
        		@method('DELETE')
        		<button type="submit" class="btn btn-sm btn-warning col-12" onclick="timeout()">Remove</button>
    		</form>
		</div>
    
</a>
