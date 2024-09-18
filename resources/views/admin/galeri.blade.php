@extends('layouts.user_type.auth')

@section('content')
    @if (session('success'))
        <div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-white">
                {{ session('success') }}
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mb-3">Data Galeri</h5>
                            </div>
                            <!-- Form and New Button -->
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                {{-- Search --}}
                                <form action="{{ route('galeris.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari gambar..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                                {{-- New Items --}}
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateGaleriModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                    +&nbsp; Tambah Gambar Baru
                                </a>
                            </div>
                            

                            
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                @foreach ($errors->all() as $error)
                                    {{ $error }} <br>
                                @endforeach
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gambar
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($galeris->currentPage() - 1) * $galeris->perPage() + 1;
                                    @endphp
                                    @forelse ($galeris as $galeri)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->gambar }}" width="100">
                                            </td>
                                            <td class="text-center">
                                                <a href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editGaleriModal"
                                                    data-id="{{ $galeri->id }}"
                                                    data-gambar="{{ $galeri->gambar }}"
                                                    class="mx-3 edit-button"
                                                    data-bs-original-title="Edit Galeri">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0 my-auto" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <div class="alert mb-0">
                                                    Data galeri belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                {{ $galeris->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Data Galeri -->
    <div class="modal fade" id="updateGaleriModal" tabindex="-1" aria-labelledby="updateGaleriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateGaleriLabel">Tambah Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('galeri.insertGaleri') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="gambar" class="form-label">
                                Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data Galeri -->
    <div class="modal fade" id="editGaleriModal" tabindex="-1" aria-labelledby="editGaleriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGaleriLabel">Edit Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editGaleriForm" action="{{ route('galeri.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="edit_gambar" name="gambar" value="{{ old('gambar') }}">
                            <button type="submit" class="btn btn-primary my-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const gambar = this.getAttribute('data-gambar');

                    // Update form action URL
                    const form = document.getElementById('editGaleriForm');
                    form.action = `/admin/galeri/${id}`;

                    // Update form inputs
                    document.getElementById('edit_gambar').value = gambar;
                });
            });
        });
    </script>
@endsection