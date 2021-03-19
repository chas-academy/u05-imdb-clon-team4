<div class="card-container d-flex flex-column p-2">

    <div id="top-rated-container" class="container mb-5">
        <h2 class="">Top rated titles</h2>
        <div class="row gx-2">
    {{-- fortsätta här om vi vill ha lådor med klickbara listor --}}

            @for($i = 0; $i <= 4; $i++)
            <div class="col">
                <div class="card p-0 border-0 rounded-0">
                    <img class="card-img-top rounded-0" src="https://image.posterlounge.se/images/l/1875927.jpg" alt="Card image cap">
                    <div class="card-body rounded-0">
                        <h2 class="card-title h5">Movie title</h2>
                        <h3 class="card-subtitle mb-2 text-muted h6">Card subtitle</h3
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            @endfor

        </div>
    </div>

    <div id="news-container" class="container mb-5">
        <div class="row gx-2">

            @for($i = 0; $i <= 4; $i++)
            <div class="col">
                <div class="card p-0 border-0 rounded-0">
                    <img class="card-img-top rounded-0" src="https://image.posterlounge.se/images/l/1875927.jpg" alt="Card image cap">
                    <div class="card-body rounded-0">
                        <h2 class="card-title h5">Movie title</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            @endfor

        </div>
    </div>

</div>

