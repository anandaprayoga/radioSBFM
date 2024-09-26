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
                            <!-- Title -->
                            <div class="col-12">
                                <h5 class="mb-3">Data Jadwal Siaran</h5>
                            </div>

                            <!-- Form and New Button -->
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                {{-- Search --}}
                                <form action="{{ route('jadwalsiaran.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari Jadwal Siaran..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-info" type="submit">Cari</button>
                                </form>
                                {{-- New Items --}}
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateJadwalModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                    +&nbsp; Tambah Jadwal
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
                                            Hari
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu Mulai
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu Berakhir
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keterangan
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Penyiar
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($jadwalsiaran->currentPage() - 1) * $jadwalsiaran->perPage() + 1;
                                    @endphp
                                    @forelse ($jadwalsiaran as $jadwal)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $jadwal->hari }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $jadwal->waktu_mulai }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $jadwal->waktu_berakhir }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $jadwal->judul }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit(strip_tags($jadwal->keterangan ), 20) }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @foreach ($jadwal->broadcasters as $bc)
                                                        {{ $bc->nama_broadcaster }}@if (!$loop->last)
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editJadwalModal" data-id="{{ $jadwal->id }}" data-hari="{{ $jadwal->hari }}" data-jam_mulai="{{ explode(':', $jadwal->waktu_mulai)[0] }}" data-menit_mulai="{{ explode(':', $jadwal->waktu_mulai)[1] }}" data-jam_berakhir="{{ explode(':', $jadwal->waktu_berakhir)[0] }}" data-menit_berakhir="{{ explode(':', $jadwal->waktu_berakhir)[1] }}" data-judul="{{ $jadwal->judul }}" data-keterangan="{{ $jadwal->keterangan }}" data-broadcasters="{{ $jadwal->broadcasters->pluck('id')->implode(',') }}" class="mx-3 edit-button" data-bs-original-title="Edit Jadwal Siaran">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('jadwalsiaran.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
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
                                                    Data jadwal siaran belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                {{ $jadwalsiaran->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk Tambah Data Event -->
    <div class="modal fade" id="updateJadwalModal" tabindex="-1" aria-labelledby="updateJadwalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventLabel">Tambah Data Jadwal</h5>
                    <button type="button" class="btn btn-link  my-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-2xl"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jadwalsiaran.insertJadwal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select class="form-control" id="hari" name="hari" required>
                                <option value="" disabled selected>Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="row">
                            <label for="jam_mulai" class="form-label">Waktu Mulai</label>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="jam_mulai" name="jam_mulai" required>
                                    <option value="" disabled selected>Jam</option>
                                    @foreach (range(0, 23) as $hour)
                                        @php
                                            $jam = sprintf('%02d', $hour);
                                        @endphp
                                        <option value="{{ $jam }}">{{ $jam }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="menit_mulai" name="menit_mulai" required>
                                    <option value="" disabled selected>Menit</option>
                                    @foreach (range(0, 59) as $minute)
                                        @php
                                            $menit = sprintf('%02d', $minute);
                                        @endphp
                                        <option value="{{ $menit }}">{{ $menit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label for="jam_mulai" class="form-label">Waktu Berakhir</label>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="jam_berakhir" name="jam_berakhir" required>
                                    <option value="" disabled selected>Jam</option>
                                    @foreach (range(0, 23) as $hour)
                                        @php
                                            $jam = sprintf('%02d', $hour);
                                        @endphp
                                        <option value="{{ $jam }}">{{ $jam }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="menit_berakhir" name="menit_berakhir" required>
                                    <option value="" disabled selected>Menit</option>
                                    @foreach (range(0, 59) as $minute)
                                        @php
                                            $menit = sprintf('%02d', $minute);
                                        @endphp
                                        <option value="{{ $menit }}">{{ $menit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penyiar</label>
                            <div class="row m-2">
                                @foreach ($broadcasters as $broadcaster)
                                    <div class="col-6 form-check">
                                        <input class="form-check-input" type="checkbox" name="id_broadcaster[]" value="{{ $broadcaster->id }}" id="broadcaster-{{ $broadcaster->id }}">
                                        <label class="form-check-label" for="broadcaster-{{ $broadcaster->id }}">
                                            {{ $broadcaster->nama_broadcaster }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data event -->
    <div class="modal fade" id="editJadwalModal" tabindex="-1" aria-labelledby="editJadwalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventLabel">Edit Data Jadwal</h5>
                    <button type="button" class="btn btn-link  my-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-2xl"></i></button>
                </div>
                <div class="modal-body">
                    <form id="editJadwalForm" action="{{ route('jadwalsiaran.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if ($jadwal ?? false)
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select class="form-control" id="edit_hari" name="hari" required>
                                <option value="" disabled>Pilih Hari</option>
                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                    <option value="{{ $hari }}" {{ old('hari', $jadwal->hari ?? '') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <label for="edit_waktu_mulai" class="form-label">Waktu Mulai</label>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="edit_jam_mulai" name="jam_mulai" required>
                                    <option value="" disabled selected>Jam</option>
                                    @foreach (range(0, 23) as $hour)
                                        <option value="{{ sprintf('%02d', $hour) }}" {{ sprintf('%02d', $hour) == old('jam_mulai', substr($jadwal->waktu_mulai, 0, 2)) ? 'selected' : '' }}>
                                            {{ sprintf('%02d', $hour) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="edit_menit_mulai" name="menit_mulai" required>
                                    <option value="" disabled selected>Menit</option>
                                    @foreach (range(0, 59) as $minute)
                                        <option value="{{ sprintf('%02d', $minute) }}" {{ sprintf('%02d', $minute) == old('menit_mulai', substr($jadwal->waktu_mulai, 3, 2)) ? 'selected' : '' }}>
                                            {{ sprintf('%02d', $minute) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label for="edit_waktu_berakhir" class="form-label">Waktu Berakhir</label>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="edit_jam_berakhir" name="jam_berakhir" required>
                                    <option value="" disabled selected>Jam</option>
                                    @foreach (range(0, 23) as $hour)
                                        <option value="{{ sprintf('%02d', $hour) }}" {{ sprintf('%02d', $hour) == old('jam_berakhir', substr($jadwal->waktu_berakhir, 0, 2)) ? 'selected' : '' }}>
                                            {{ sprintf('%02d', $hour) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-control" id="edit_menit_berakhir" name="menit_berakhir" required>
                                    <option value="" disabled selected>Menit</option>
                                    @foreach (range(0, 59) as $minute)
                                        <option value="{{ sprintf('%02d', $minute) }}" {{ sprintf('%02d', $minute) == old('menit_berakhir', substr($jadwal->waktu_berakhir, 3, 2)) ? 'selected' : '' }}>
                                            {{ sprintf('%02d', $minute) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="edit_judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" value="{{ old('judul') ?? ($jadwal?->judul ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="keterangan" value="{{ old('keterangan') ?? ($jadwal?->keterangan ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penyiar</label>
                            <div class="row m-2">
                                @foreach ($broadcasters as $broadcaster)
                                    <div class="col-6 form-check">
                                        <input class="form-check-input" type="checkbox" name="id_broadcaster[]" value="{{ $broadcaster->id }}" id="edit-broadcaster-{{ $broadcaster->id }}">
                                        <label class="form-check-label" for="edit-broadcaster-{{ $broadcaster->id }}">
                                            {{ $broadcaster->nama_broadcaster }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                    const hari = this.getAttribute('data-hari');
                    const jamMulai = this.getAttribute('data-jam_mulai'); // ambil jam mulai
                    const menitMulai = this.getAttribute('data-menit_mulai'); // ambil menit mulai
                    const jamBerakhir = this.getAttribute('data-jam_berakhir'); // ambil jam berakhir
                    const menitBerakhir = this.getAttribute('data-menit_berakhir'); // ambil menit berakhir
                    const judul = this.getAttribute('data-judul');
                    const keterangan = this.getAttribute('data-keterangan');
                    const broadcasters = this.getAttribute('data-broadcasters');

                    // Update form action URL
                    const form = document.getElementById('editJadwalForm');
                    form.action = `/admin/jadwalsiaran/${id}`;

                    // Update form inputs
                    document.getElementById('edit_hari').value = hari;
                    document.getElementById('edit_jam_mulai').value = jamMulai; // set jam mulai
                    document.getElementById('edit_menit_mulai').value = menitMulai; // set menit mulai
                    document.getElementById('edit_jam_berakhir').value = jamBerakhir; // set jam berakhir
                    document.getElementById('edit_menit_berakhir').value = menitBerakhir; // set menit berakhir
                    document.getElementById('edit_judul').value = judul;
                    document.getElementById('edit_keterangan').value = keterangan;

                    // Reset semua checkbox
                    document.querySelectorAll('input[name="id_broadcaster[]"]').forEach(checkbox => {
                        checkbox.checked = false; // Reset semua checkbox
                    });

                    // Centang checkbox yang sesuai
                    if (broadcasters) {
                        broadcasters.split(',').forEach(broadcasterId => {
                            const checkbox = document.getElementById(`edit-broadcaster-${broadcasterId}`);
                            if (checkbox) {
                                checkbox.checked = true; // Centang checkbox yang sesuai
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
