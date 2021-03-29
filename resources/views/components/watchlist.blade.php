@for($i = 0; $i < count($movies); $i++)
	<div class="col movie-cards-col h-100">
		{{-- Include cards --}}
    	@include('components.cards', ['movies' => $movies])
		<div class="card-footer mb-4">
     		<form action="{{route('remove_from_watchlist', $movies[$i]->id)}}" method="post" >
        		@csrf
        		@method('DELETE')
        		<button type="submit" class="btn btn-sm btn-warning my-2 col-12" onclick="timeout()">Remove</button>
    		</form>
		</div>
	</div>
@endfor
