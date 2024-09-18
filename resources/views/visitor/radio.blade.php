@extends('layouts.user_type.visitor')
@section('content')
<div id="boxes">
    <div id="boxes">
        <div id="player03"  class="player horizontal">
            <div class="container">
                <div class="info-wrapper">
                    @if($onAirHost)
                    <img src="{{ asset('storage/' . $onAirHost->broadcaster_image) }}"
                        alt="Foto {{ $onAirHost->nama_broadcaster }}" >
                    @else
                    <img src="{{ asset('visitor/img/sbfm.jpeg') }}"
                        alt="No host on air" class="img-fluid" style="width: 200px;height: 140px; border-radius: 10px;">
                    @endif
                    <div class="info">
                        <h1>Suara Bangkalan FM 92,1 Mhz</h1>
                        <h5 class="mb-2">{{ $onAirHost ? $onAirHost->nama_broadcaster : 'No Host On Air' }}</h5>
                        <i class="fas fa-calendar-alt mr-2"></i> <span id="current-date"></span>
                        @if($onAirHost)
                            <div class="controls">
                                <div class="play" id="play-pause">
                                    <i class="fa-solid fa-play" id="left"></i>
                                </div>
                                <input type="range" class="form-range volume-slider" id="volume-control" min="0" max="1" step="0.01" value="1">
                            </div>
                        @else
                          <p>Tidak ada Host yang sedang OnAir.</p>
                        @endif
                    </div>
                </div>
            </div>
            <audio id="audio" src="https://ia800905.us.archive.org/19/items/FREE_background_music_dhalius/backsound.mp3"  type="audio/mp3"></audio>
        </div>    
    </div>   
</div>
<div class="container py-5 py-lg-11 position-relative z-index-1">
    <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
            <h5 class="mb-4 aos-init aos-animate" data-aos="fade-up">Jadwal Program Radio SBFM </h5>
            <div class="nav nav-pills flex-column aos-init aos-animate" id="myTab" role="tablist" data-aos="fade-up">
              <button class="nav-link px-4 text-start mb-3" id="d1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Senin</span>
              </button>
              
              <button class="nav-link px-4 text-start mb-3" id="d2-tab" data-bs-toggle="tab" data-bs-target="#day2" type="button" role="tab" aria-controls="day2" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Selasa</span>
              </button>

              <button class="nav-link px-4 text-start mb-3" id="d3-tab" data-bs-toggle="tab" data-bs-target="#day3" type="button" role="tab" aria-controls="day3" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Rabu</span>
              </button>

              <button class="nav-link px-4 text-start mb-3" id="d4-tab" data-bs-toggle="tab" data-bs-target="#day4" type="button" role="tab" aria-controls="day4" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Kamis</span>
              </button>

              <button class="nav-link px-4 text-start mb-3" id="d5-tab" data-bs-toggle="tab" data-bs-target="#day5" type="button" role="tab" aria-controls="day5" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Jum'at</span>
              </button>

              <button class="nav-link px-4 text-start mb-3" id="d6-tab" data-bs-toggle="tab" data-bs-target="#day6" type="button" role="tab" aria-controls="day6" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Sabtu</span>
              </button>

              <button class="nav-link px-4 text-start mb-3" id="d7-tab" data-bs-toggle="tab" data-bs-target="#day7" type="button" role="tab" aria-controls="day7" aria-selected="false">
                  <span class="d-block fs-5 fw-bold">Minggu</span>
              </button>
          </div>
        </div>
        
        <div class="col-lg-8 col-xl-8">
            <div data-aos="fade-up" class="tab-content aos-init aos-animate" id="myTabContent">
                <div class="tab-pane fade" id="day1" role="tabpanel" aria-labelledby="d1-tab">
                    <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Layi</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dapil</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Lela</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Dangdut Rancak + Pilihan (Berita Ringan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Goyang Pantura</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Layi</h5>
                                </div>
                                <p class="mb-0">
                                Lagu Dangdut Madura + Dangdut Biasa (Berita Budaya + Wisata Bangkalan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Faisol</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara, Berita Kesehatan, Berita Ringan, Berita Dunia, Berita Nasional dan Remaja (Milenial)
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="tab-pane fade" id="day2" role="tabpanel" aria-labelledby="d2-tab">
                  <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aryan, Layi</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dapil</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Lela</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Dangdut Rancak + Pilihan (Berita Ringan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Goyang Pantura</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">M. Yaqin</h5>
                                </div>
                                <p class="mb-0">
                                Lagu Dangdut Madura + Dangdut Biasa (Berita Budaya + Wisata Bangkalan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Udin</h5>
                                </div>
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara, Berita Kesehatan, Berita Ringan, Berita Dunia, Berita Nasional dan Remaja (Milenial)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="day3" role="tabpanel" aria-labelledby="d3-tab">
                <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aryan, Layi</h5>
                                </div>
                                <p class="mb-0">
                                    Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dapil</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Lela</h5>
                                </div>
                                <p class="mb-0">
                                    Lagu Dangdut Rancak + Pilihan (Berita Ringan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Goyang Pantura</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">M. Yaqin</h5>
                                </div>
                                <p class="mb-0">
                                Lagu Dangdut Madura + Dangdut Biasa (Berita Budaya + Wisata Bangkalan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Faisol</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara, Berita Kesehatan, Berita Ringan, Berita Dunia, Berita Nasional dan Remaja (Milenial)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="day4" role="tabpanel" aria-labelledby="d4-tab">
                <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aryan, Layi</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dapil</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Lela</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Dangdut Rancak + Pilihan (Berita Ringan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Goyang Pantura</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">M. Yaqin</h5>
                                </div>
                            
                                <p class="mb-0">
                                Lagu Dangdut Madura + Dangdut Biasa (Berita Budaya + Wisata Bangkalan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Udin</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara, Berita Kesehatan, Berita Ringan, Berita Dunia, Berita Nasional dan Remaja (Milenial)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="day5" role="tabpanel" aria-labelledby="d5-tab">
                <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Layi</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dapil</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aisah</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagi Dangdut Rancak + Pilihan (Berita Ringan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Goyang Pantura</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">M. Yaqin</h5>
                                </div>
                            
                                <p class="mb-0">
                                Lagu Dangdut Madura + Dangdut Biasa (Berita Budaya + Wisata Bangkalan)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Faisol</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara, Berita Kesehatan, Berita Ringan, Berita Dunia, Berita Nasional dan Remaja (Milenial)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="day6" role="tabpanel" aria-labelledby="d6-tab">
                  <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News On The Weekend</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aryan</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia dan Mancanegara (Self Improvement Info-Info Pengembangan Diri dan Skill)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Pik-R</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aisah</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Nostalgia + Pop Mancanegara (Berita Ringan, Info, Tips, dan Berita Nasional)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dangdut + Bollywood</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Udin</h5>
                                </div>
                                
                                <p class="mb-0">
                                14:00-16:00 WIB (Lagu Dangdut Disco + Rancak + Koplo) <br>
                                16:00-17:00 WIB (Lagu Bollywood)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Faisol</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara (Curhat Wa, IG)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="day7" role="tabpanel" aria-labelledby="d7-tab">
                  <ul class="pt-4 list-unstyled mb-0">
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              06:00 - 10:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Morning News On The Weekend</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Aryan</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia dan Mancanegara (Self Improvement Info-Info Pengembangan Diri dan Skill)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              10:00 - 14:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>AADR (Ada Apa Di Radio)</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Faisol</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Nostalgia + Pop Mancanegara (Berita Ringan, Info, Tips, dan Berita Nasional)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              14:00 - 18:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Dangdut + Bollywood</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Layi</h5>
                                </div>
                                
                                <p class="mb-0">
                                14:00-16:00 WIB (Lagu Dangdut Disco + Rancak + Koplo) <br>
                                16:00-17:00 WIB (Lagu Bollywood)
                                </p>
                            </div>
                        </li>
                        <li class="d-flex flex-column flex-md-row py-4">
                            <span class="flex-shrink-0 width-13x me-md-4 d-block mb-3 mb-md-0 small text-muted">
                              18:00 - 22:00 WIB
                            </span>
                            <div class="flex-grow-1 ps-4 border-start border-3">
                                <h4>Syair Pujangga atau Serabi</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-headset fa-lg mb-2 mx-1"></i>
                                    <h5 class="text-info">Udin</h5>
                                </div>
                                
                                <p class="mb-0">
                                    Lagu Pop Indonesia + Mancanegara (Curhat Wa, IG)
                                </p>
                            </div>
                        </li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-menu-container">
  <div class="inner-menu closed">
    <ul class="menu-list">
      <li class="menu-item">
        <span class="item-icon">
          <a href="https://wa.link/280iqh"><i class="fa-regular fa-circle-question fa-lg" style="color: #ffffff;"></i></a>
        </span>
        <span class="item-text"><a href="">Pertanyaan</a></span></li>
      <li class="menu-item">
        <span class="item-icon">
          <a href="">
            <i class="fa-solid fa-music fa-lg" style="color: #ffffff;"></i>
          </a>
          
        </span>
        <span class="item-text"><a href=""> Permintaan Music</a></span>
      </li>
    </ul>
  </div>
  <div class="outer-button">
    <div class="icon-container">
      <i class="fa-solid fa-xmark close-icon fa-lg" style="color: #ffffff;"></i>
      <i class="fa-regular fa-paper-plane arrow-icon fa-lg" style="color: #ffffff;"></i>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
      var today = new Date().getDay();
      var tabId = "";

      switch (today) {
          case 0: // Minggu
              tabId = "d7-tab";
              break;
          case 1: // Senin
              tabId = "d1-tab";
              break;
          case 2: // Selasa
              tabId = "d2-tab";
              break;
          case 3: // Rabu
              tabId = "d3-tab";
              break;
          case 4: // Kamis
              tabId = "d4-tab";
              break;
          case 5: // Jumat
              tabId = "d5-tab";
              break;
          case 6: // Sabtu
              tabId = "d6-tab";
              break;
      }

      var activeTab = document.getElementById(tabId);
      var activeContent = document.querySelector(activeTab.getAttribute("data-bs-target"));

      if (activeTab && activeContent) {
          activeTab.classList.add("active");
          activeContent.classList.add("active", "show");
          activeTab.setAttribute("aria-selected", "true");
      }
  });
  // Mendapatkan tanggal hari ini
  var today = new Date();

  // Opsi format tanggal
  var options = { 
    weekday: 'short', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
  };

  // Menampilkan tanggal di elemen dengan id 'current-date'
  document.getElementById('current-date').textContent = today.toLocaleDateString('id-ID', options);

</script>
@endsection