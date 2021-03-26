@php
    // Check if the current user is the reviewer. Hide review title if user is reviewer
    $userIsReviewer = !auth()->user() || auth()->user()->name !== $review->user_name;
@endphp

<div class="col-lg-10 mx-auto">
    <div class="card-body d-flex flex-column">
        <div class="card my-2 ">
            <h3 class="card-header ">{{ $review->title }}</h3>
            <div class="card-body">                
                @if ($userIsReviewer)
                    <p>Reviewer: {{ $review->user_name }}</p> 
                @endif
                <p class="card-text">{!! $review->description !!}</p>
            </div>
        </div>
    </div>
</div>