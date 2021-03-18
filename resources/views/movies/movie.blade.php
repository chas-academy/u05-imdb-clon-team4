@extends('layouts.app')

@section('content')

  <div class="d-flex-sm justify-content-between ">
        <h1 class="mr-auto p-2 col-sm-12"> Once upon a time in Hollywood</h1>
       <div class="d-inline-flex mx-6">
        <button type="button" class="btn btn-warning m-2 p-2">Rating</button>
        <button type="button" class="btn btn-primary m-2 p-2">Add movie to list</button> 
       </div>
    </div>

<div class="d-flex col">
            <p class="p-2">2019</p>
            <p class="p-2">15</p>
            <p class="p-2">2H 20min</p>
        </div>

<div class="d-flex mb-4">
    <div class="col-lg-2 col-sm-12 ">
    <img src="/images/once.jpg" class="img-fluid">
    </div>

    <div class="col-lg-4 ms-4 mx-2">
        <h2>Storyline</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa quidem iste laudantium asperiores, dolorem illo
            quibusdam voluptatem earum maiores nulla quisquam ratione et iusto deleniti eos perspiciatis sed dignissimos.
            Esse.
        </p>
        <p >Director: </p>
        <p >Writer: </p>
        <p >Stars: </p>
       
    </div>

</div>
 <h2>User reviews</h2>
@endsection
