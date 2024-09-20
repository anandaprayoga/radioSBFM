@extends('layouts.user_type.visitor')

@section('content')
<main class="">
  <div style="margin-top: 60px;" id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('visitor/img/studio.jpg') }}" class="d-block w-100 img-slider" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('visitor/img/situation.jpg') }}" class="d-block w-100 img-slider" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('visitor/img/podcast.jpeg') }}" class="d-block w-100 img-slider" alt="Third slide">
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

<main class="container pb-5">
    <div class="row featurette py-5">
      <div class="col-md-7 my-auto">
        <h2 class="featurette-heading fw-normal lh-1">Tentang kami</h2>
        <span style="border-bottom: 3px solid; display: block; width: 150px; color: #21d4fd; margin-bottom: 10px;"></span>
        <p style="text-align: justify;">Suara Bangkalan Fm telah hadir membersamai masyarakat Bangkalan dan sekitarnya selama lebih dari 30 tahun dengan menyajikan informasi yang aktual dan faktual disertai dengan semangat  menyajikan hiburan yang berkualitas bagi para pendengar. Program siaran Suara Bangkalan Fm dirancang untuk dapat memenuhi kebutuhan informasi publik dalam racikan selera kontemporer. Program Siaran Suara Bangkalan FM juga dirancang seimbang antara program hiburan, pendidikan, dan informasi yang dikemas dalam program-program yang menarik.</p>
        <p style="text-align: justify;">Fokus Suara Bangkalan Fm dalam memberikan informasi yang Actual dan Factual dengan prinsip Cover Both Side melalui acara Talk Show, Dialog interaktif, dan siaran langsung reportase dari tempat kejadian, menjadikan Suara Bangkalan tepat sebagai teman mengisi waktu luang yang berkualitas bagi para pendengar. Pada acara hiburan, 80 % lagu-lagu yang diputar di Suara Bangkalan Fm adalah musik indonesia hal ini dimaksudkan untuk mengajak pendengar menghargai produk dalam negeri sedangkan 20 % lagu-lagu Dangdut Madura dan Barat.</p>
      </div>
      <div class="col-md-5 my-auto">
        <img class="img-fluid" src="{{ asset('visitor/img/studio1.jpg') }}" alt="">
      </div>
    </div>

    <hr class="featurette-divider">
    <div class="row featurette py-5">
      <div class="col-md-7 order-md-2 my-auto">
        <h2 class="featurette-heading fw-normal lh-1">Napak Tilas Suara Bangkalan Fm</h2>
        <span style="border-bottom: 3px solid; display: block; width: 150px; color: #21d4fd; margin-bottom: 10px;"></span>
        <p style="text-align: justify;">Suara Bangkalan Fm hadir pertama kali menyapa masyarakat melalui udara dengan format Radio Choesoes Pemerintah Daerah (RCPD) dengan koordinasi langsung di bawah Humas Protokol Pemerintah Daerah. RCPD Kabupaten Bangkalan juga melakukan proses kolaborasi dengan radio swasta Gita Segara dengan pembagian tugas RCPD menyuplai berita-berita pemerintah daerah sedangkan radio swasta melengkapinya dengan program-program hiburan. </p>
        <p style="text-align: justify;">RCPD Kabupaten Bangkalan kemudian berdiri secara mandiri kembali dengan memiliki frekuensi khusus AM di 13,86 AM. Pengelolaan dan penanggung jawab radio AM ini masih di bawah naungan Humas Protokol Pemerintah Kabupaten Bangkalan. Dimulai pada tahun 2000 ketika radio bertransformasi menjadi Fm, radio telah memiliki nama khusus Suara Bangkalan Fm yang kala itu mendapatkan jatah frekuensi 102,3 Fm. Pada masa ini Radio Suara Bangkalan Fm bernaung di bawah Departemen Infokom yang pada akhirnya merger di bawah naungan Dinas Perhubungan-Kominfo Kabupaten Bangkalan.</p>
        <p style="text-align: justify;">Kemudian, pada tahun 2017 mulai didirikan secara khusus Dinas Komunikasi dan Informatika Kabupaten Bangkalan. Secara otomatis, pengelolaan Radio Suara Bangkalan Fm beralih di bawah naungan Dinas Komunikasi dan Informatika Kabupaten Bangkalan. Hingga saat ini, Radio Suara Bangkalan FM telah mengudara membersamai masyarakat Bangkalan dan sekitarnya lebih dari 30 tahun.</p>
        <p style="text-align: justify;">Terima kasih kepada Mitra Dengar Suara Bangkalan Fm yang telah setia mendengarkan dan menemani Suara Bangkalan Fm hingga saat ini.</p>
      </div>
      <div class="col-md-5 order-md-1 my-auto">
        <img class="img-fluid" src="{{ asset('visitor/img/narasumber.jpg') }}" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

  <div class="row mb-2 py-5">
    <div class="container px-4" id="custom-cards">
      <div class="cites">
        <i class="fa-solid fa-quote-left"></i>
      </div>
      <div class="row">
        <div class="col">
          <div class="tagline py-4">
            <p class="text-center fs-2 fw-bolder fst-italic">Satu Suara Berjuta Telinga</p>
            <span class="mx-auto" style="border-bottom: 3px solid; display: block; width: 150px; color: #21d4fd; margin-bottom: 10px;"></span>
            <p class="text-center fst-italic">Suara Bangkalan FM</p>
          </div>
          <div class="container texttagline">
            <p style="text-align: justify;">Dengan tagline "Satu Suara, Berjuta Telinga", kami berharap Suara Bangkalan Fm dapat diterima oleh khalayak luas sebagai media rujukan informasi yang valid dan faktual yang juga memberikan alternatif hiburan dan media edukasi interaktif bagi masyarakat. </p>
            <p class="text-center fs-5 fw-medium">Mari Stay Tuned di 92,1 MHz Suara Bangkalan Fm, <br>
            Satu Suara, Berjuta Telinga.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="featurette-divider">


  <section>
    <h2 class="pb-2 text-center py-5">Team Broadcaster</h2>
    <span class="mx-auto" style="border-bottom: 3px solid; display: block; width: 150px; color: #21d4fd; margin-bottom: 10px;"></span>
    <div class="row">
    @foreach($teambroadcast as $broadcaster)
        <div class="col-md-4">
            <div class="cardteam">
                <div class="img-container">
                    <img src="{{ asset('storage/' . $broadcaster->broadcaster_image) }}" alt="{{ $broadcaster->name }}" />
                </div>
                <h3>{{ $broadcaster->nama_broadcaster }}</h3>
                <p>Broadcaster</p>
            </div>
        </div>
    @endforeach
</div>
  </section>
</main>
@endsection