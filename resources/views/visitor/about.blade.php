@extends('layouts.user_type.visitor')

@section('content')
<main class="container">
  <div style="margin-top: 95px;" id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner custom-carousel-height">
        <div class="carousel-item active">
          <img src="{{ asset('visitor/img/about-us.jpg') }}" class="d-block w-100" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('visitor/img/about-us.jpg') }}" class="d-block w-100" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('visitor/img/about-us.jpg') }}" class="d-block w-100" alt="Third slide">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>
  <div class="row mb-2">
    <div class="container px-4 py-5" id="custom-cards">
      <h2 class="pb-2">Learn More About Us</h2>
      <div class="row">
        <div class="col">
          <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, provident amet! Praesentium unde asperiores nostrum, incidunt optio iste sapiente. Praesentium asperiores, id enim cumque perferendis quas tempore, aliquid eligendi reiciendis necessitatibus delectus assumenda ipsa facere. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque similique at blanditiis sequi eveniet expedita nobis minima nesciunt recusandae deserunt dolores nulla, consequatur rerum quam fuga nisi. Sequi ullam ipsam dolores provident doloribus cum accusamus natus odio odit velit, minus aspernatur quaerat non! Repudiandae architecto error provident ipsum at labore.</p>
          <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, fugiat. Saepe ullam officiis itaque in facilis quia, quas illum quae eaque unde autem soluta voluptate repudiandae? Vitae itaque, atque rem repudiandae a quia, totam libero, debitis culpa molestiae earum sapiente ad dicta maiores. Soluta praesentium autem repellat molestias modi consectetur ut perferendis suscipit dolor quis magnam ratione quam et, aut est doloribus quas laudantium dolorum ex a consequuntur? Nostrum quia facere, accusantium ab blanditiis quidem eum sunt nesciunt eius dolore alias, at voluptatibus porro illo ipsam? Sequi ipsum, cumque quae at placeat distinctio ab non nisi. Veniam qui quod eos!</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="container">
      <div class="col">
        <h3 class="pb-3 mb-3">Staff Suara Bangkalan FM</h3>
        <div class="album bg-body-white">
            <div class="row  row-cols-sm-2 row-cols-md-2 g-3">
              <div class="col">
                <div class="card mb-3 border-0 shadow" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('visitor/img/trump.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card mb-3 border-0 shadow" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('visitor/img/trump.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card mb-3 border-0 shadow" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('visitor/img/trump.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card mb-3 border-0 shadow" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('visitor/img/trump.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
    </div>
  </div>

</main>
@endsection