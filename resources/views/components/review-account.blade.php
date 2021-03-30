 <li class="list-group-item fw-bold text-light d-flex justify-content-between bg-dark col-12 "><span class="col-10">{{ $review->title }}</span><span class=" col-2 d-flex align-items-center justify-content-center " style="min-height:48px;">
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