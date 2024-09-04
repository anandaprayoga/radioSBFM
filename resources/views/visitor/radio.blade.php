@extends('layouts.user_type.visitor')
@section('content')
<div id="boxes">
    <div id="boxes">
        <div id="player03"  class="player horizontal">
            <div class="container">
                <div class="info-wrapper">
                    <img src="{{ asset('visitor/img/broadcaster/Bang Ithonk.jpg') }}" alt="LogoMusicImage">
                    <div class="info">
                        <h1>Suara Bangkalan FM 92,1 Mhz</h1>
                        <h5 class="mb-2">Bang Ithonk</h5>
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
<div class="sticky-menu-container">
  <div class="inner-menu closed">
    <ul class="menu-list">
      <li class="menu-item">
        <span class="item-icon">
          <a href=""><i class="fa-regular fa-circle-question fa-xl" style="color: #ffffff;"></i></a>
        </span>
        <span class="item-text"><a href="">Quetion</a></span></li>
      <li class="menu-item">
        <span class="item-icon">
          <a href="">
            <i class="fa-solid fa-music fa-xl" style="color: #ffffff;"></i>
          </a>
          
        </span>
        <span class="item-text"><a href=""> Request Music</a></span>
      </li>
    </ul>
  </div>
  <div class="outer-button">
    <div class="icon-container">
      <i class="fa-solid fa-xmark close-icon" style="color: #ffffff;"></i>
      <i class="fa-regular fa-paper-plane arrow-icon" style="color: #ffffff;"></i>
    </div>
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
    
    console.clear();
    var isAnimating = false;
    var isOpen = false;
    var button = document.querySelector(".sticky-menu-container .outer-button");
    var menu = document.querySelector(".sticky-menu-container .inner-menu");
    var closeIcon = document.querySelector(".sticky-menu-container .outer-button .close-icon");
    var arrowIcon = document.querySelector(".sticky-menu-container .outer-button .arrow-icon");
    var menuItems = document.querySelectorAll(".sticky-menu-container .inner-menu > .menu-list > .menu-item");

    var itemTexts = document.querySelectorAll(".sticky-menu-container .inner-menu > .menu-list > .menu-item > .item-text");

    button.addEventListener("click", function(){
      if(isAnimating) return;
      this.classList.add("clicked");
      menu.classList.toggle("closed");
      
      if(isOpen){
        closeIcon.classList.remove("show");
        closeIcon.classList.add("hide");
        arrowIcon.classList.remove("hide");
        arrowIcon.classList.add("show");
        menuItems.forEach(function(item){
          console.log(item);
          item.classList.add("text-hides");
        });
        itemTexts.forEach(function(text, index){
            setTimeout(function(){
              text.classList.remove("text-in");
            });
        });
        isOpen = false;
      }
      else{
        closeIcon.classList.remove("hide");
        closeIcon.classList.add("show");
        arrowIcon.classList.remove("show");
        arrowIcon.classList.add("hide");
        menuItems.forEach(function(item){
          console.log(item);
          item.classList.remove("text-hides");
        });
        itemTexts.forEach(function(text, index){
            setTimeout(function(){
              text.classList.add("text-in");
            }, index*150);
        });
        isOpen = true;
      }
      
    });

    button.addEventListener("animationstart", function(event){
      isAnimating = true;
    });

    button.addEventListener("animationend", function(event){
      isAnimating = false;
      this.classList.remove("clicked");
    });



</script>
@endsection