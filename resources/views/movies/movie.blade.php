@extends('layouts.app')

@section('content')
<div class=" d-flex flex-column g-0 justify-content-evenly col-lg-10 mx-auto">

    <section class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-lg-12 d-lg-flex flex-row row ">
            <div class="col-sm-12 ts-4 col-md-12 col-lg-6">
                <h3 class=" title ">Once upon a time in Hollywood</h3>
                <div class="d-flex col">
                    <p class="p-2">2019</p>
                    <p class="p-2">15</p>
                    <p class="p-2">2H 20min</p>
                </div>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-6">
                <button type="button" class="btn btn-warning m-2 p-2 col-sm-6 col-lg-2 ">Rating</button>
                <button type="button" class="btn btn-primary m-2 p-2 col-sm-6 col-lg-4">Add movie to list</button>
            </div>

        </div>



    </section>

    <section class="col-sm-12 col-md-12 d-lg-flex justify-content-lg-start flex-row ">

        <div class="row my-auto col-lg-12">
            <div class="col-lg-5">
                <img src="/images/once.jpg" class="image-fluid">
            </div>


            <div class="col-sm-12 col-lg-5 ">
                <h2>Storyline</h2>

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
    <div id="reviews">
        <h2>User reviews</h2>
    </div>

</div>


<!-- <div class="d-flex-sm row justify-content-between">
    <div class="col">
        <h1 class="mr-auto p-2 text-break"> Once upon a time in Hollywood</h1>
    </div>


</div>

<div class="d-flex col">
    <p class="p-2">2019</p>
    <p class="p-2">15</p>
    <p class="p-2">2H 20min</p>
</div>

<div class="d-flex mb-4 container">
    <div class=" row justify-content-start">

        <div class="col-lg-2 col-sm-12 ">

        </div>



        <div class="d-inline-flex col-sm-12">
            <button type="button" class="btn btn-warning m-2 p-2 col-sm-6">Rating</button>
            <button type="button" class="btn btn-primary m-2 p-2 col-sm-6">Add movie to list</button>
        </div>
    </div>
</div>
<h2>User reviews</h2> -->
@endsection