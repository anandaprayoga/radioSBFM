@extends('layouts.user_type.visitor')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center sectionEvent category">
        <h3>Search Results:</h3>
    </div>
    <div class="search py-5">
        @if($informasis->isEmpty())
            <div class="alert alert-info" role="alert">
                Tidak ada berita yang ditemukan untuk "{{ request()->query('query') }}".
            </div>
        @else
            @foreach($informasis as $informasi)
                <div class="card mb-3 border-0 align-items-center" style="100%">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $informasi->gambar_informasi) }}" class="img-fluid fix-size" alt="{{ $informasi->judul_informasi }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <strong class="d-inline-block mb-2 text-success-emphasis">{{ $informasi->kategori->nama_kategori }}</strong>
                                <h5 class="card-title">{{ $informasi->judul_informasi }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($informasi->isi_informasi), 100) }}</p>
                                <p class="card-text"><small class="text-body-secondary">{{ $informasi->created_at->format('d F Y') }}</small></p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('berita.detail', $informasi->id) }}" class="btn btn-primary ms-auto p-2">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="py-5">
      {{ $informasis->links() }}
    </div>
</div>
@endsection
