@extends('layouts.user_type.visitor')
@section('content')
<!--=============== Slide ===============-->
<main class="">
  <div style="margin-top: 50px;" id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('visitor/img/about-us.jpg') }}" class="d-block w-100" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
      </div>
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
</main>
<div class="container py-4">
  <!--=============== Event ===============-->
  <div class="row mb-2">
    <div class="container px-3 py-5 position-relative" id="custom-cards">
        <div class="sectionEvent">Event Program</div>
        <div class="scroll-container py-3 position-relative">
            <!-- Add "scrollable-row" class for custom scrolling -->
            <div class="scrollable-row row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3  flex-nowrap">
              <div class="col d-inline-block">
                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-sm border-0 triggerModal">
                      <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1 animate-hover">
                          <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Title 1</h3>
                      </div>
                  </div>
              </div>
              <div class="col d-inline-block">
                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-sm border-0 triggerModal">
                      <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1 animate-hover">
                          <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Title 1</h3>
                      </div>
                  </div>
              </div>
              <div class="col d-inline-block">
                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-sm border-0 triggerModal">
                      <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1 animate-hover">
                          <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Title 1</h3>
                      </div>
                  </div>
              </div>
              <div class="col d-inline-block">
                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-sm border-0 triggerModal">
                      <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1 animate-hover">
                          <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Title 1</h3>
                      </div>
                  </div>
              </div>
                
                <!-- Add more cards here -->
            </div>

            <!-- Left and Right Arrows -->
            <div class="scroll-arrow left-arrow">&#10094;</div>
            <div class="scroll-arrow right-arrow">&#10095;</div>
        </div>
    </div>
  </div>
  <!--=============== News ===============-->
  <div class="row g-3 py-4">
    <div class="col-md-8 ">
      <div class="section">Berita Popular</div>
      <div class="album py-2.5 bg-body-white">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('visitor/img/about-us.jpg') }}" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                <div class="card-body">
                  <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                  <h3 class="mb-1"><a class="titleberita" href="{{ url('/berita') }}">Post title</a></h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-body-secondary">10 November 2024</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('visitor/img/about-us.jpg') }}" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                <div class="card-body">
                  <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                  <h3 class="mb-1"><a class="titleberita" href="{{ url('/berita') }}">Post title</a></h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-body-secondary">10 November 2024</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('visitor/img/about-us.jpg') }}" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                <div class="card-body">
                  <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                  <h3 class="mb-1"><a class="titleberita" href="{{ url('/berita') }}">Post title</a></h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-body-secondary">10 November 2024</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('visitor/img/about-us.jpg') }}" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                <div class="card-body">
                  <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                  <h3 class="mb-1"><a class="titleberita" href="{{ url('/berita') }}">Post title</a></h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-body-secondary">10 November 2024</small>
                  </div>
                </div>
              </div>
            </div>
            

          </div>
        </div>
    </div>
    <!--=============== Live Streaming ===============-->
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-0 mb-2 bg-body-white rounded">
          <div class="section">Live Streaming</div>
          <script type='text/javascript'>
            var cstrFreePlayerUid = 590582;
            var cstrFreePlayerTheme = 'color';
            var cstrFreePlayerColor = '45b5ff';
          </script>
          <script type='text/javascript' src='//corscdn.caster.fm/freeplayer/FreePlanPlayerEmbed.js'></script>
          <a id='cstrFreePlayerBL1' href='//www.caster.fm/'>Free Shoutcast Hosting</a>
          <a id='cstrFreePlayerBL2' href='//www.caster.fm/'>Radio Stream Hosting</a>
          <div id='cstrFreePlayerDiv'></div>
        </div>
        <div>
        <div class="section">Berita Terbaru</div>
          <ul class="list-unstyled postterbaru">
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-2 link-body-emphasis text-decoration-none" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                <div class="col-lg-8">
                  <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                  <small class="text-body-secondary">January 13, 2023</small>
                </div>
              </a>
            </li>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                <div class="col-lg-8">
                  <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                  <small class="text-body-secondary">January 13, 2023</small>
                </div>
              </a>
            </li>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                <div class="col-lg-8">
                  <h6 class="mb-0 titleberita">Longer blog post title: This one has multiple lines!</h6>
                  <small class="text-body-secondary">January 13, 2023</small>
                </div>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pentingnya Dokumen Kependudukan</h5>
              <!-- Close button for modal -->
              <button type="button" class="btn-close" id="closeModal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex flex-column flex-md-row">
              <!-- Image section -->
              <div class="col-md-4 mb-3 mb-md-0">
                  <img src="{{asset('visitor/img/event.jpeg')}}" class="img-fluid rounded-4" alt="Description Image">
              </div>
              <!-- Description section -->
              <div class="col-md-8 p-3">
                  <p>Dokumen Kependudukan seringkali menjadi syarat bagi masyarakat yang ingin mengakses dan mendapatkan layanan publik...</p>
                  <ul>
                      <li>Tanggal: Kamis, 25 Juli 2024</li>
                      <li>Waktu: 09:00-10:00 WIB</li>
                      <li>Pembicara: Agus Suharyono, S.AP.</li>
                      <li>Host: Layinuvar (SBFM Announcer)</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection
