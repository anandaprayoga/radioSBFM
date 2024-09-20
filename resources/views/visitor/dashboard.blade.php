@extends('layouts.user_type.visitor')
@section('content')
    <!--=============== Slide ===============-->
    <main class="">
        <div style="margin-top: 60px;" id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> -->
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('visitor/img/bersama.jpg') }}" class="d-block w-100 img-slider" alt="First slide">
                        <div class="dark-overlay"></div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('visitor/img/narasumber.jpg') }}" class="d-block w-100 img-slider" alt="Second slide">
                        <div class="dark-overlay"></div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('visitor/img/studio1.jpg') }}" class="d-block w-100 img-slider" alt="Third slide">
                        <div class="dark-overlay"></div>
                    </div>
                </div>
            </div>

            <!-- Tagline hanya ditulis sekali di luar carousel-inner -->
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 0; bottom: 0;">
                <div class="tagline">
                    <h1 class="text-center">"Satu Suara Berjuta Telinga"</h1>
                    <p class="text-center" data-aos="zoom-in-up">Suara Bangkalan FM 92,1 Mhz</p>
                </div>
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
            <div class="container px-3 py-4 position-relative" id="custom-cards">
                <div class="sectionEvent">Event Program</div>
                <div class="slideevent py-4" data-aos="fade-left">
                    <div class="wrapper">
                        @if ($events->isEmpty())
                            <p class="text-center">Belum ada event dalam waktu dekat</p>
                        @else
                            @if ($events->count() > 3)
                                <i class="fas fa-angle-left" id="left"></i>
                            @endif
                            <ul class="carousel1">
                                @foreach ($events as $event)
                                    <li class="card1" style="background-image: url('{{ asset('storage/' . $event->gambar_event) }}');">
                                        <div class="overlay">
                                            <div class="text-container">
                                                <h2>{{ $event->nama_event }}</h2>
                                                <p>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}</p>
                                                <p>{{ $event->status_event }}</p>
                                            </div>
                                            <button class="detail-button" data-bs-toggle="modal" data-bs-target="#viewdetail{{ $event->id }}">View Details</button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @if ($events->count() > 3)
                                <i class="fas fa-angle-right" id="right"></i>
                            @endif
                        @endif


                    </div>
                </div>
            </div>
        </div>
        <!--=============== News ===============-->
        <div class="row g-3 py-4">
            <div class="col-md-8">
                <div class="section">Berita Terbaru</div>
                <div class="album py-2.5 bg-body-white">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
                        @foreach ($informasis as $informasi)
                            <div class="col">
                                <div class="card border-0 shadow-sm">
                                    <img src="{{ asset('storage/' . $informasi->gambar_informasi) }}" width="100%" height="230" class="card-img-top" alt="{{ $informasi->judul_informasi }}">
                                    <div class="card-body">
                                        <strong class="d-inline-block mb-2 text-info">{{ $informasi->kategori->nama_kategori }}</strong>
                                        <h5 class="mb-1">
                                            <a class="titleberita" href="{{ route('berita.detail', $informasi->id) }}">
                                                {{ Str::limit(strip_tags($informasi->judul_informasi), 40) }}
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            {{ Str::limit(strip_tags($informasi->isi_informasi), 50) }} <!-- Limit description to 100 characters -->
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-body-secondary">{{ $informasi->created_at->format('d F Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--=============== Live Streaming ===============-->
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-0 mb-2 bg-body-white rounded">
                        <div class="section">Live Radio</div>
                        <div class="card" style="border-radius: 15px; border: 0; box-shadow: 0 0 2.4em rgba(25, 0, 58, 0.1);">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 my-auto">
                                        @if ($onAirHost)
                                            <img src="{{ asset('storage/' . $onAirHost->broadcaster_image) }}" alt="Foto {{ $onAirHost->nama_broadcaster }}" class="img-fluid" style="width: 140px; height: 140px; object-fit: cover; border-radius: 10px;">
                                        @else
                                            <img src="{{ asset('visitor/img/sbfm.jpeg') }}" alt="No host on air" class="img-fluid" style="width: 140px; border-radius: 10px;">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">{{ $onAirHost ? $onAirHost->nama_broadcaster : 'No Host On Air' }}</h5>
                                        @if ($onAirHost)
                                            <p class="mb-1">Host</p>
                                            <div class="d-flex iconlive">
                                                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                                                <dotlottie-player src="https://lottie.host/f8ff8951-9884-4a21-85e1-0373094dfa7f/d5heYBexrI.json" background="transparent" speed="1" style="width: 30px; height: 30px;" loop autoplay></dotlottie-player>
                                                <p class="my-auto">Live Now</p>
                                            </div>
                                            <div class="d-flex pt-1">
                                                <a href="{{ url('/radio') }}" class="btn flex-grow-1 tombollive">Listen Now!</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- YOUTUBE --}}
                    @if (isset($videoId))
                        <div class="section">Live YouTube</div>
                        <div class="p-0 mb-2 bg-body-white rounded">
                            <div class="livestream" style="width: 100%">
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif

                    <div class="beritapopular py-4">
                        <div class="section">Berita Popular</div>
                        @if ($popularNews->isEmpty())
                            <p class="text-center">Belum ada Berita Popular dalam Minggu ini</p>
                        @else
                            <ul class="list-unstyled postterbaru">
                                @foreach ($popularNews as $news)
                                    <li>
                                        <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-bottom" href="{{ route('berita.detail', $news->id) }}">
                                            <img src="{{ asset('storage/' . $news->gambar_informasi) }}" class="recentpost" alt="{{ $news->judul_informasi }}">
                                            <div class="col-lg-8">
                                                <h6 class="mb-0">{{ Str::limit(strip_tags($news->judul_informasi), 40) }}</h6>
                                                <small class="text-body-secondary">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</small>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    @foreach ($events as $event)
        <!-- Modal -->
        <div class="modal fade" id="viewdetail{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $event->nama_event }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $event->gambar_event) }}" class="img-fluid" alt="Event Image">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <h3>{{ $event->nama_event }}</h3>
                                <p>{{ $event->keterangan }}</p>
                                <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</p>
                                <p><strong>Tanggal Berakhir:</strong> {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
