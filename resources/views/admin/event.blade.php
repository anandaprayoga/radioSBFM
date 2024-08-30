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
                                <form action="{{ route('events.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari broadcaster..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                                {{-- New Items --}}
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateEventModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gambar Event
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Event
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Mulai
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Selesai
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keterangan
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status Event
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($events->currentPage() - 1) * $events->perPage() + 1;
                                    @endphp
                                    @forelse ($events as $event)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/' . $event->gambar_event) }}" alt="{{ $event->nama_event }}" width="100">
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $event->nama_event }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $event->tanggal_mulai }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $event->tanggal_selesai }}</p>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm detail-button preview-button" data-bs-toggle="modal" data-bs-target="#detailEventModal" data-keterangan="{{ $event->keterangan }}">
                                                    Lihat
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $event->status_event }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editEventModal"
                                                    data-id="{{ $event->id }}"
                                                    data-gambar_event="{{ $event->gambar_event }}"
                                                    data-nama_event="{{ $event->nama_event }}"
                                                    data-tanggal_mulai="{{ $event->tanggal_mulai }}"
                                                    data-tanggal_selesai="{{ $event->tanggal_selesai }}"
                                                    data-keterangan="{{ $event->keterangan }}"
                                                    data-status_event="{{ $event->status_event }}"
                                                    class="mx-3 edit-button"
                                                    data-bs-original-title="Edit Event">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0 my_auto" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <div class="alert mb-0">
                                                    Data event belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $events->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Data Event -->
    <div class="modal fade" id="updateEventModal" tabindex="-1" aria-labelledby="updateEventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateEventLabel">Tambah Data Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('event.insertEvent') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_event" class="form-label">Nama Event</label>
                            <input type="text" class="form-control" id="nama_event" name="nama_event" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">
                                Detail Event</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">
                                Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">
                                Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_event" class="form-label">
                                Gambar Event</label>
                            <input type="file" class="form-control" id="gambar_event" name="gambar_event" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data event -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventLabel">Edit Data Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editEventForm" action="{{ route('event.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="edit_nama_event" class="form-label">ID</label>
                            <input type="text" class="form-control" id="edit_event_id" name="event_id"
                                value="{{ isset($event->id) ? $event->id : '' }}" disabled>
                        </div> --}}
                        <div class="mb-3">
                            <label for="edit_nama_event" class="form-label">Nama Event</label>
                            <input type="text" class="form-control" id="edit_nama_event" name="nama_event" value="{{ old('nama_event') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="edit_tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="edit_tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="keterangan" value="{{ old('keterangan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_gambar_event" class="form-label">Gambar Event</label>
                            <input type="file" class="form-control" id="edit_gambar_event" name="gambar_event" value="{{ old('gambar_event') }}">
                            {{-- <input type="hidden" id="edit_event_id" name="event_id"> --}}
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailEventModal" tabindex="-1" aria-labelledby="detailEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailEventModalLabel">Keterangan Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalEventContent"></div>
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
                    const nama_event = this.getAttribute('data-nama_event');
                    const tanggal_mulai = this.getAttribute('data-tanggal_mulai');
                    const tanggal_selesai = this.getAttribute('data-tanggal_selesai');
                    const keterangan = this.getAttribute('data-keterangan');
                    const gambar_event = this.getAttribute('data-gambar_event');
                    const status_event = this.getAttribute('data-status_event');

                    // Update form action URL
                    const form = document.getElementById('editEventForm');
                    form.action = `/admin/event/${id}`;

                    // Update form inputs
                    document.getElementById('edit_nama_event').value = nama_event;
                    document.getElementById('edit_tanggal_mulai').value = tanggal_mulai;
                    document.getElementById('edit_tanggal_selesai').value = tanggal_selesai;
                    document.getElementById('edit_keterangan').value = keterangan;
                    document.getElementById('edit_gambar_event').value = gambar_event;
                    document.getElementById('edit_status_event').value = status_event;
                    document.getElementById('edit_event_id').value = id;
                });
            });
            document.querySelectorAll('.preview-button').forEach(button => {
                button.addEventListener('click', function() {
                    const keterangan = this.getAttribute('data-keterangan');

                    document.getElementById('modalEventContent').innerHTML = keterangan;
                    const detailModal = new bootstrap.Modal(document.getElementById('detailEventModal'));
                    detailModal.show();
                });
            });
        });
    </script>
@endsection
