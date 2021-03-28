@php
    // Check if the current user is the reviewer. Hide review title if user is reviewer
    $userIsReviewer = !auth()->user() || auth()->user()->name !== $review->user_name;
@endphp
<div class="col">
	<div class="card p-0 border-0 rounded-0">
    	<h3 class="card-header bg-primary rounded-0 h5">{{ $review->title }}</h3>
    	<div class="card-body rounded-0">
        	<p class="card-text">{!! $review->description !!}</p>
    	</div>
		@if ($userIsReviewer)
		<div class="card-footer text-silver rounded-0">
			Reviewer: {{ $review->user_name }}
		</div>
		@endif
	</div>
</div>
