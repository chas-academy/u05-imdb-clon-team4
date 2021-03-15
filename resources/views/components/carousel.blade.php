{{-- @extends('layouts.app') --}}
 <div
      id="carouselExampleCaptions"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>
      <div class="container">
        <div class="carousel-inner p-3">
          <div class="carousel-item active">
            <img
              src="images/yesterday.jpg"
              class="d-inline-block w-100"
              alt="..."
              height="600"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>
                Some representative placeholder content for the first slide.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/hollywood.jpg"
              class="d-inline-block w-100"
              alt="..."
              height="600"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>
                Some representative placeholder content for the second slide.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/midsommar.jpg"
              class="d-inline-block w-100"
              alt="..."
              height="600"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>
                Some representative placeholder content for the third slide.
              </p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div>
        <h2 class="text-center">Other content below</h2>
        <div class="container ">
        {{-- fortsätta här om vi vill ha lådor med klickbara listor --}}
            <div class="row d-flex justify-content-around">
                <div class="col-md-8">
                Listcontainer
                </div>
                <div class="col-md-8">
                Another listcontainer
                </div>
                <div class="col-md-8">
                Another listcontainer
                </div>
            </div>
            </div>

    </div>
