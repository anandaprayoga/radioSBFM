@extends('layouts.user_type.visitor')

@section('content')
<div class="container">
    <div class="category py-5 text-center">
        <div class="d-flex justify-content-center sectionEvent">
            <h3>Category :</h3>
            <h3 class="text-primary px-1">{{ $kategori->nama_kategori }}</h3>
        </div>
    </div>
    <div class="dropdown py-3" data-aos="fade-up" data-aos-duration="1000">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tahun
        </button>
        <ul class="dropdown-menu">
            @foreach($years as $year)
                <li>
                    <a class="dropdown-item" href="{{ url('/category/' . $kategori->id . '?year=' . $year) }}">
                        {{ $year }}
                    </a>
                </li>
            @endforeach
            <li>
                <a class="dropdown-item" href="{{ url('/category/' . $kategori->id) }}">All Years</a>
            </li>
        </ul>
    </div>

    <div class="album py-2.5 bg-body-white">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            @foreach($informasis as $informasi)
                <div class="col" data-aos="fade-up" data-aos-duration="1000">
                    <a class="text-decoration-none" href="{{ route('berita.detail', $informasi->id) }}">
                        <div class="card shadow border-0">
                            <img src="{{ asset('storage/' . $informasi->gambar_informasi) }}" class="card-img-top img-berita" alt="{{ $informasi->judul_informasi }}">
                            <div class="card-body">
                                <strong class="d-inline-block mb-2 text-info">{{ $informasi->kategori->nama_kategori }}</strong>
                                <h5 class="mb-1">{{ Str::limit($informasi->judul_informasi, 40) }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($informasi->isi_informasi), 50) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-body-secondary">{{ $informasi->created_at->format('d F Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="py-5">
        {{ $informasis->links() }} <!-- Menampilkan pagination -->
    </div>
</div>
@endsection
