@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <!-- Title -->
                            <div class="col-12">
                                <h5 class="mb-3">Data Broadcast</h5>
                            </div>

                            <!-- Form and New Button -->
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                {{-- Search --}}
                                <form action="{{ route('informasis.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari broadcaster..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                                {{-- New Items --}}
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateInformasiModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                    +&nbsp; New
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
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gambar Informasi
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Informasi
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                    @php
                                        $i = ($informasis->currentPage() - 1) * $informasis->perPage() + 1;
                                    @endphp
                                    @forelse ($informasis as $informasi)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
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
                                                <button type="button" class="btn btn-info btn-sm detail-button preview-button" data-bs-toggle="modal" data-bs-target="#detailInformasiModal" data-isi_informasi="{{ $informasi->isi_informasi }}">
                                                    Isi Informasi
                                                </button>
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
                                                    Data informasi belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                {{ $informasis->links('pagination::bootstrap-5') }}
                            </div>
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
                            <input type="text" class="form-control" id="editor" name="isi_informasi" required>
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
        <div class="modal-dialog modal-dialog-scrollable">
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
                            <input type="hidden" id="edit_isi_informasi" name="isi_informasi" required>
                            <div id="quill-editor-container">{!! old('isi_informasi', $informasi->isi_informasi ?? '') !!}</div>
                        </div>

                        <div class="mb-3">
                            <label for="edit_gambar_informasi" class="form-label">Gambar Informasi</label>
                            <input type="file" class="form-control" id="edit_gambar_informasi" name="gambar_informasi" value="">
                            {{-- <input type="hidden" id="event_id" name="event_id"> --}}
                            <button type="submit" class="btn btn-primary my-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailInformasiModal" tabindex="-1" aria-labelledby="detailInformasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailInformasiModalLabel">Detail Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalInformasiContent"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],
                ['link', 'image', 'video', 'formula'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'list': 'check'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                [{
                    'size': ['small', false, 'large', 'huge']
                }], // custom dropdown
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['clean'] // remove formatting button
            ];
            const quillEditorContainer = document.getElementById('quill-editor-container');
            let quillEditor = new Quill(quillEditorContainer, {
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'Ketik di sini...',
                theme: 'snow',
            });

            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const id_kategori = this.getAttribute('data-id_kategori');
                    const judul_informasi = this.getAttribute('data-judul_informasi');
                    const isi_informasi = this.getAttribute('data-isi_informasi');
                    const gambar_informasi = this.getAttribute('data-gambar_informasi');

                    const form = document.getElementById('editInformasiForm');
                    form.action = `/admin/informasi/${id}`;
                    document.getElementById('edit_judul_informasi').value = judul_informasi;
                    document.getElementById('edit_kategori').value = id_kategori;
                    document.getElementById('edit_isi_informasi').value = isi_informasi;

                    // Kosongkan Quill Editor sebelum diisi
                    quillEditor.root.innerHTML = '';
                    quillEditor.clipboard.dangerouslyPasteHTML(isi_informasi);

                    quillEditor.on('text-change', function() {
                        document.getElementById('edit_isi_informasi').value = quillEditor.root.innerHTML;
                    });
                });
            });

            document.querySelectorAll('.preview-button').forEach(button => {
                button.addEventListener('click', function() {
                    const isi_informasi = this.getAttribute('data-isi_informasi');

                    document.getElementById('modalInformasiContent').innerHTML = isi_informasi;
                    const detailModal = new bootstrap.Modal(document.getElementById('detailInformasiModal'));
                    detailModal.show();
                });
            });
        });
    </script>
@endsection
