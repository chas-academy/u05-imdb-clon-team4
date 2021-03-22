@extends('layouts.default')

@section('content')
<div class=" d-flex flex-column g-0 justify-content-evenly col-lg-10 mx-auto">

    <section class="col-sm-12 col-md-12 col-lg-12 ">
        <div class="col-lg-12 d-lg-flex flex-row row  ">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h3 class=" title ">Once upon a time in Hollywood</h3>
                <div class="d-flex col">
                    <p class="p-2">2019</p>
                    <p class="p-2">15</p>
                    <p class="p-2">2H 20min</p>
                </div>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-6">
            
                <button type="button" class="btn btn-primary m-2 p-2 col-sm-6 col-lg-6"><i class="fa fa-plus mx-2"style=" pointer-events: none;"></i>Add to list</button>
            </div>
    
        </div>



    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row  h-auto ">

        <div class="row mb-5 py-2 col-lg-12">
            <div class="col-lg-5 h-50">
                <img src="/images/movie1.png">
            </div>


            <div class="col-sm-12 col-lg-5  h-50">
                <h2 class="mt-2">Storyline</h2>

                <p class="my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa quidem iste laudantium
                    asperiores,
                    dolorem
                    illo
                    quibusdam voluptatem earum maiores nulla quisquam ratione et iusto deleniti eos perspiciatis sed
                    dignissimos.
                    Esse.
                </p>
                <p>Director: </p>
                <p>Writer: </p>
                <p>Stars: </p>

            </div>
        </div>

    </section>


</div>
<section class="col-lg-10 mx-auto">
    <div class="container">
        <h1 class="title text-center">User reviews</h1>
        <div class="card-body d-flex flex-column">
            @for($i = 0; $i < 4; $i++) <div class="card my-2 ">
                <h3 class="card-header ">
                    Username
                </h3>
                <div class="card-body ">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, nemo?</p>
                    <a href="#" class="btn btn-primary float-end mx-10">Admin Delete</a>
                </div>



        </div>
        @endfor
    </div>
    </div>

</section>


@endsection