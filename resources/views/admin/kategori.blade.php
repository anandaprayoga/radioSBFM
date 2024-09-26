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
                                <h5 class="mb-3">Data Kategori</h5>
                            </div>
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                {{-- Search --}}
                                <form action="{{ route('kategoris.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari Kategori..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-info" type="submit">Cari</button>
                                </form>
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateKategoriModal" class="btn bg-gradient-primary btn-sm searchtambah1" type="button">
                                    +&nbsp; Tambah Kategori
                                </a>
                            </div>

                            <!-- Modal untuk Tambah Data Kategori -->
                            <div class="modal fade" id="updateKategoriModal" tabindex="-1" aria-labelledby="updateKategoriLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateKategoriLabel">Tambah Data kategori</h5>
                                            <button type="button" class="btn btn-link  my-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-2xl"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('kategori.insertKategori') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nama_kategori" class="form-label">
                                                        Kategori</label>
                                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kategori
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($kategoris->currentPage() - 1) * $kategoris->perPage() + 1;
                                    @endphp
                                    @forelse ($kategoris as $kategori)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $kategori->nama_kategori }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editKategoriModal" data-id="{{ $kategori->id }}" data-nama_kategori="{{ $kategori->nama_kategori }}" class="mx-3 edit-button" data-bs-toggle="tooltip" data-bs-original-title="Edit kategori">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
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
                                            <td colspan="3" class="text-center">
                                                <div class="alert mb-0">
                                                    Data kategori belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                {{ $kategoris->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data Kategori -->
    <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriLabel">Edit Data Kategori</h5>
                    <button type="button" class="btn btn-link  my-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-2xl"></i></button>
                </div>
                <div class="modal-body">
                    <form id="editKategoriForm" action="{{ route('kategori.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="edit_nama_kategori" class="form-label">ID</label>
                            <input type="text" class="form-control" id="edit_kategori_id" name="kategori_id"
                                value="{{ isset($kategori->id) ? $kategori->id : '' }}" disabled>
                        </div> --}}
                        <div class="mb-3">
                            <label for="edit_nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                        </div>
                        {{-- <input type="hidden" id="edit_kategori_id" name="kategori_id"> --}}
                        <button type="submit" class="btn btn-primary my-3">Update</button>
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
                    const kategori = this.getAttribute('data-nama_kategori');

                    // Update form action URL
                    const form = document.getElementById('editKategoriForm');
                    form.action = `/admin/kategori/${id}`;

                    // Update form inputs
                    document.getElementById('edit_nama_kategori').value = kategori;
                    document.getElementById('edit_kategori_id').value = id;
                });
            });
        });
    </script>
@endsection
