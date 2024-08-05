@extends('layouts.navbars.visitor.nav');
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Radio | SBFM Bangkalan</title>
    

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('visitor/style.css') }}">

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('visitor/css/blog.css') }}" rel="stylesheet">
  </head>
  <body>
    <main class="container">
      <div style="margin-top: 95px;" id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../visitor/img/about-us.jpg" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
              <img src="../visitor/img/about-us.jpg" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img src="../visitor/img/about-us.jpg" class="d-block w-100" alt="Third slide">
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
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          From the Firehose
        </h3>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
              <h3 class="mb-0">Featured post</h3>
              <div class="mb-1 text-body-secondary">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-body-secondary">Nov 11</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-5">
        <div class="col-md-8">
          <h3 class="pb-4 mb-4 fst-italic border-bottom">
            From the Firehose
          </h3>
          <div class="album py-2.5 bg-body-white">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="../visitor/img/about-us.jpg" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                    <div class="card-body">
                      <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                      <h3 class="mb-1">Post title</h3>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary">10 November 2024</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="../visitor/img/about-us.jpg" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                    <div class="card-body">
                      <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                      <h3 class="mb-1">Post title</h3>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary">10 November 2024</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="../visitor/img/about-us.jpg" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                    <div class="card-body">
                      <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                      <h3 class="mb-1">Post title</h3>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary">10 November 2024</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="../visitor/img/about-us.jpg" width="100%" height="230" class="card-img-top" alt="Your Image Alt Text">
                    <div class="card-body">
                      <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                      <h3 class="mb-1">Post title</h3>
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

        <div class="col-md-4">
          <div class="position-sticky" style="top: 2rem;">
            <div class="p-0 mb-3 bg-body-white rounded liveradio">
              <script type="text/javascript">var cstrFreePlayerUid = 590584;var cstrFreePlayerTheme = "purple";var cstrFreePlayerColor = "";</script>
	<script type="text/javascript" src="//corscdn.caster.fm/freeplayer/FreePlanPlayerEmbed.js"></script>
	<!--   DO NOT REMOVE THE LINKS BELOW, THEY  WILL BE HIDDEN (AND WILL HELP US A LOT)   -->
	<a id="cstrFreePlayerBL1" href="//www.caster.fm/">Free Shoutcast Hosting</a><a id="cstrFreePlayerBL2" href="//www.caster.fm/">Radio Stream Hosting</a>
	<div id="cstrFreePlayerDiv"></div>
            </div>

            <div>
              <h4 class="fst-italic">Recent posts</h4>
              <ul class="list-unstyled">
                <li>
                  <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <img width="100%" height="96px" src="../visitor/img/news.webp" class="recentpost" alt="">
                    <div class="col-lg-8">
                      <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                      <small class="text-body-secondary">January 13, 2023</small>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <img width="100%" height="96px" src="../visitor/img/news.webp" class="recentpost" alt="">
                    <div class="col-lg-8">
                      <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                      <small class="text-body-secondary">January 13, 2023</small>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <img width="100%" height="96px" src="../visitor/img/news.webp" class="recentpost" alt="">
                    <div class="col-lg-8">
                      <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                      <small class="text-body-secondary">January 13, 2023</small>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('visitor/script.js') }}"></script>
  </body>

  </body>
</html>

@extends('layouts.footers.visitor.footer');