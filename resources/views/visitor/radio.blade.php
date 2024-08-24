@extends('layouts.user_type.visitor')
@section('content')
<div id="boxes">
    <div id="boxes">
        <div id="player03"  class="player horizontal">
            <div class="container">
                <div class="info-wrapper">
                    <img src="https://cdn.pixabay.com/photo/2017/08/05/22/29/gorilla-2586193_1280.jpg" alt="LogoMusicImage">
                    <div class="info">
                        <h1>Suara Bangkalan FM 92,1 Mhz</h1>
                        <i class="fas fa-calendar-alt mr-2"></i> Mon, May 25th 2020
                        <div class="controls">
                            <div class="play" id="play-pause">
                                <i class="fa-solid fa-play" id="left"></i>
                            </div>
                            <input id="volume-control" type="range" min="0" max="1" step="0.01" value="1" class="volume-slider">
                        </div>
                    </div>
                </div>
            </div>
            <audio id="audio" src="https://ia800905.us.archive.org/19/items/FREE_background_music_dhalius/backsound.mp3"  type="audio/mp3"></audio>
        </div>    
    </div>   
</div>
<div class="container px-3 py-5 position-relative" id="custom-cards">
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
    document.addEventListener('DOMContentLoaded', function() {
        const audio = document.getElementById('audio');
        const playPauseBtn = document.getElementById('play-pause');
        const playIcon = document.getElementById('left');
        const volumeControl = document.getElementById('volume-control');

        playPauseBtn.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                playIcon.classList.remove('fa-play');
                playIcon.classList.add('fa-pause');
            } else {
                audio.pause();
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
            }
        });

        volumeControl.addEventListener('input', function () {
            audio.volume = volumeControl.value;
        });
    });
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