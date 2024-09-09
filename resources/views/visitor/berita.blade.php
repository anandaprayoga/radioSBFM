@extends('layouts.user_type.visitor')

@section('content')
<main style="margin-top: 90px;" class="container">
  <div class="row g-3">
    <div class="col-md-8">
      <div class="text-center pb-3">
          <img src="{{ asset('storage/' . $informasi->gambar_informasi) }}" class="img-fluid gambarberita" alt="{{ $informasi->judul_informasi }}">
      </div>
      <article class="blog-post">
          <strong class="d-inline-block mb-2 text-success-emphasis px-3" style="background-color:#21d4fd;">
              {{ $informasi->kategori->nama_kategori }}
          </strong>
          <h2 class="titleberita display-6 link-body-emphasis mb-1">
              {{ $informasi->judul_informasi }}
          </h2>
          <p class="blog-post-meta">
              {{ $informasi->created_at->format('d F Y') }}
          </p>
          <p>
              {!! $informasi->isi_informasi !!} <!-- Tampilkan isi informasi dengan format HTML -->
          </p>
      </article>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="section">Berita Terbaru</div>
          <ul class="list-unstyled postterbaru">
            @foreach($latestNews as $news)
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-bottom" href="{{ route('berita.detail', $news->id) }}">
                  <img src="{{ asset('storage/' . $news->gambar_informasi) }}" class="recentpost" alt="{{ $news->judul_informasi }}">
                  <div class="col-lg-8">
                    <h6 class="mb-0">{{ $news->judul_informasi }}</h6>
                    <small class="text-body-secondary">{{ $news->created_at->format('d F Y') }}</small>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
