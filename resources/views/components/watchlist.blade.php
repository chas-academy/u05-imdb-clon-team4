@for($i = 0; $i < count($movies); $i++)
	<div class="col-sm-12 row-cols-12 col-lg-3 mb-2  movie-cards">
		{{-- Include cards --}}
    	@include('components.account-movie-card', ['movies' => $movies])
		
	</div>
@endfor
