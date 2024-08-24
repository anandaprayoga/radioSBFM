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

</script>
@endsection