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
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-bottom" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                <div class="col-lg-8">
                  <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                  <small class="text-body-secondary">January 13, 2023</small>
                </div>
              </a>
            </li>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-bottom" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
                <div class="col-lg-8">
                  <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                  <small class="text-body-secondary">January 13, 2023</small>
                </div>
              </a>
            </li>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-bottom" href="{{ url('/berita') }}">
                <img src="{{ asset('visitor/img/news.webp') }}" class="recentpost" alt="">
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
@endsection
