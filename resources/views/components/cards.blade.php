    <div class="d-flex flex-column align-items-center card-container">
           <h2 class="text-center mt-3">Other content below</h2>

        <div class="container row p-2 gx-5">
        {{-- fortsätta här om vi vill ha lådor med klickbara listor --}}


          @for($i = 0; $i <= 5; $i++)
        <div class="card text-dark bg-light col m-3" style="max-width: 18rem;">

            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
            @endfor


            </div>
            </div>

    </div>
