@for($i = 0; $i < count($movies); $i++)
	<div class="col-sm-12  col-lg-3 mb-3  movie-cards">
		{{-- Include cards --}}
    	@include('components.account-movie-card', ['movies' => $movies])
		
	</div>
@endfor
