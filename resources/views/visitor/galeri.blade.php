@extends('layouts.user_type.visitor')
@section('content')
<div class="container px-3 py-5 position-relative" style="margin-top: 50px;" id="custom-cards">
    <div class="sectionEvent">Gallery Foto</div>
    <div class="lightbox">
      <div class="wrapper1">
        <header>
          <div class="details">
            <i class="uil uil-camera"></i>
            <span>Image Preview</span>
          </div>
          <div class="buttons"><i class="fa-solid fa-xmark"></i></div>
        </header>
        <div class="preview-img">
          <div class="img"><img src="" alt="preview-img"></div>
        </div>
      </div>
    </div>
    <section class="gallery">
      <ul class="images">
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/trump.jpg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/podcast.png') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/about-us.jpg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/trump.jpg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/podcast.png') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/about-us.jpg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/event.jpeg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/trump.jpg') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/podcast.png') }}" alt="img"></li>
        <li class="img"><img src="{{ asset('visitor/img/about-us.jpg') }}" alt="img"></li>
      </ul>
    </section>
    <div class="py-5">
      <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </div>
</div>
<script>
    const allImages = document.querySelectorAll(".images .img");
    const lightbox = document.querySelector(".lightbox");
    const closeImgBtn = lightbox.querySelector(".fa-solid");

    allImages.forEach(img => {
        // Calling showLightBox function with passing clicked img src as argument
        img.addEventListener("click", () => showLightbox(img.querySelector("img").src));
    });

    const showLightbox = (img) => {
        // Showing lightbox and updating img source
        lightbox.querySelector("img").src = img;
        lightbox.classList.add("show");
        document.body.style.overflow = "hidden";
    }

    closeImgBtn.addEventListener("click", () => {
        // Hiding lightbox on close icon click
        lightbox.classList.remove("show");
        document.body.style.overflow = "auto";
    });
</script>
@endsection