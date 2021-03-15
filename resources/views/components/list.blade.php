    <div class="d-flex col">
        <div {{-- class="col" --}}><h2 class="text-center">Other content below</h2></div>

        <div class="container bg-dark row p-2 gx-5">
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
