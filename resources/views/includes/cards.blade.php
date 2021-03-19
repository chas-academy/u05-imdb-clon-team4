<div class="card-container d-flex flex-column p-2">

    <div id="top-rated-container" class="container mb-4">
        <div class="mt-3 mb-4">
            <h2 class="">Top new picks</h2>
            <h3 class="h5">Some sub-title</h3>
        </div>
        <div class="row gx-4 flex-nowrap">
    {{-- fortsätta här om vi vill ha lådor med klickbara listor --}}

            @for($i = 0; $i <= 4; $i++)
            <div class="col">
                <div class="card p-0 border-0 rounded-0">
                    <img class="card-img-top rounded-0" src="https://image.posterlounge.se/images/l/1875927.jpg" alt="Card image cap">
                    <div class="card-body rounded-0">
                        <h3 class="card-title h5">Movie title</h2>
                        <p class="card-subtitle mb-2 text-muted h6">Year <span></span></p>
                    </div>
                </div>
               </div>
            @endfor

        </div>
    </div>

</div>
