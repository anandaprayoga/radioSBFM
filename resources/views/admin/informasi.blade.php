@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Data Informasi</h5>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateInformasiModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                +&nbsp; Tambah Informasi Baru
                            </a>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gambar Informasi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Informasi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kategori
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Isi Informasi
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Update
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($informasis as $informasi)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/' . $informasi->gambar_informasi) }}" alt="{{ $informasi->judul_informasi }}" width="100">
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $informasi->judul_informasi }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $informasi->kategori->nama_kategori ?? 'Kategori tidak tersedia' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $informasi->isi_informasi }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $informasi->updated_at }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editInformasiModal" data-id="{{ $informasi->id }}" data-gambar_informasi="{{ $informasi->gambar_informasi }}" data-id_kategori="{{ $informasi->id_kategori }}" data-judul_informasi="{{ $informasi->judul_informasi }}" data-tanggal_informasi="{{ $informasi->tanggal_informasi }}" data-isi_informasi="{{ $informasi->isi_informasi }}" data-tanggal_update="{{ $informasi->tanggal_update }}" class="mx-3 edit-button" data-bs-original-title="Edit Informasi">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('informasi.destroy', $informasi->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <div class="alert mb-0">
                                                    Data informasi belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk Tambah Data Informasi -->
    <div class="modal fade" id="updateInformasiModal" tabindex="-1" aria-labelledby="updateInformasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateInformasiLabel">Tambah Data Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('informasi.insertInformasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_informasi" class="form-label">Judul Informasi</label>
                            <input type="text" class="form-control" id="judul_informasi" name="judul_informasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-control" id="kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="tanggal_informasi" class="form-label">Tanggal Informasi</label>
                            <input type="date" class="form-control" id="tanggal_informasi" name="tanggal_informasi" required>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="status_informasi" class="form-label">Status Informasi</label>
                            <input type="text" class="form-control" id="status_informasi" name="status_informasi" required>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="tanggal_update" class="form-label">Tanggal Update</label>
                            <input type="date" class="form-control" id="tanggal_update" name="tanggal_update" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="isi_informasi" class="form-label">Isi Informasi</label>
                            <input type="text" class="form-control" id="isi_informasi" name="isi_informasi" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_informasi" class="form-label">Gambar Informasi</label>
                            <input type="file" class="form-control" id="gambar_informasi" name="gambar_informasi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data Informasi -->
    <div class="modal fade" id="editInformasiModal" tabindex="-1" aria-labelledby="editInformasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInformasiLabel">Edit Data Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editInformasiForm" action="{{ route('informasi.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                        <label for="judul_informasi" class="form-label">ID</label>
                        <input type="text" class="form-control" id="event_id" name="event_id"
                            value="{{ isset($event->id) ? $event->id : '' }}" disabled>
                    </div> --}}
                        <div class="mb-3">
                            <label for="edit_judul_informasi" class="form-label">Judul Informasi</label>
                            <input type="text" class="form-control" id="edit_judul_informasi" name="judul_informasi" value="{{ old('judul_informasi') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_kategori" class="form-label">Kategori</label>
                            <select class="form-control" id="edit_kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="edit_tanggal_informasi" class="form-label">Tanggal Informasi</label>
                            <input type="date" class="form-control" id="edit_tanggal_informasi" name="tanggal_informasi" value="{{ old('tanggal_informasi') }}" required>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="edit_status_informasi" class="form-label">Status Informasi</label>
                            <input type="text" class="form-control" id="edit_status_informasi" name="status_informasi" value="{{ old('status_informasi') }}" required>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="edit_tanggal_update" class="form-label">Tanggal Update</label>
                            <input type="date" class="form-control" id="edit_tanggal_update" name="tanggal_update" value="{{ old('tanggal_update') }}" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="edit_isi_informasi" class="form-label">Isi Informasi</label>
                            <input type="text" class="form-control" id="edit_isi_informasi" name="isi_informasi" value="{{ old('isi_informasi') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_gambar_informasi" class="form-label">Gambar Informasi</label>
                            <input type="file" class="form-control" id="edit_gambar_informasi" name="gambar_informasi" value="">
                            {{-- <input type="hidden" id="event_id" name="event_id"> --}}
                            <button type="submit" class="btn btn-primary">Update</button>
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
                    const id_kategori = this.getAttribute('data-id_kategori');
                    const judul_informasi = this.getAttribute('data-judul_informasi');
                    const tanggal_informasi = this.getAttribute('data-tanggal_informasi');
                    const tanggal_update = this.getAttribute('data-tanggal_update');
                    const isi_informasi = this.getAttribute('data-isi_informasi');
                    const gambar_informasi = this.getAttribute('data-gambar_informasi');

                    // Update form action URL
                    const form = document.getElementById('editInformasiForm');
                    form.action = `/admin/informasi/${id}`;

                    // Update form inputs
                    document.getElementById('edit_judul_informasi').value = judul_informasi;
                    document.getElementById('edit_tanggal_informasi').value = tanggal_informasi;
                    document.getElementById('edit_tanggal_update').value = tanggal_update;
                    document.getElementById('edit_isi_informasi').value = isi_informasi;
                    document.getElementById('edit_gambar_informasi').value = gambar_informasi;
                    document.getElementById('edit_kategori').value = id_kategori;

                });
            });
        });
    </script>
    <!-- Initialize Quill editor -->
    <script>
        const quill1 = new Quill('#edit_isi_informasi', {
            placeholder: 'Compose an epic...',
            theme: 'snow', // or 'bubble'
        });
    </script>
    <script>
        const quill2 = new Quill('#isi_informasi', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['code-block'],
                ],
            },
            placeholder: 'Compose an epic...',
            theme: 'snow', // or 'bubble'
        });
    </script>
@endsection
