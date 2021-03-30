<a href="movie/{{ $review->movie->id }}" class="card p-0 border-0 rounded-0 mb-4">
    <h3 class="card-header p-2 bg-primary rounded-0 h6">{{ $review->movie->title }}</h3>
    <div class="card-body rounded-0 p-2">
        <p class="card-text">{{ $review->title }}</p>
    </div>
    <div class="card-footer text-muted rounded-0 p-2 d-flex justify-content-between">
        @if($review->status->id === 1)
        <i>Pending</i>
        <i class="circle bg-warning "></i>

        @elseif($review->status->id === 2)
         <i>Draft</i>

        @elseif($review->status->id === 3)
        <i>Published</i>
        <i class="circle bg-success "></i>

        @else($review->status->id === 4)
        <i>Denied</i>
        <i class="circle bg-danger"></i>

        @endif
    </div>
</a>
