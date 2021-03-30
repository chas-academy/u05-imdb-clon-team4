 <li class="list-group-item fw-bold text-dark d-flex justify-content-between ">{{ $review->title }}<span>
         @if($review->status->id=== 1)
         <i class="circle bg-warning "></i>



         @elseif($review->status->id=== 2)
         <i class="circle bg-danger"></i>



         @else($review->status->id=== 3)
         <i class="circle bg-success "></i>



         @endif

     </span></li>
 <style>
.circle { 
height: 25px;
width: 25px;
  border-radius: 50%;
  display: inline-block;
}

 </style>