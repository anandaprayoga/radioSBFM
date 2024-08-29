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
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Data Broadcast</h5>
                            </div>
                            <!-- <div class="bg- border-radius-lg d-flex" style="margin-left: 550px;">
                                                <input type="text" class="form-control border-0 ps-3" style="height: 40px; margin-top:5px; margin-right: 5px;" placeholder="Type here...">
                                                <button class="btn bg-gradient-primary my-1 me-1">Search</button>
                                            </div> -->

                            {{-- Search --}}
                            <form action="{{ route('broadcasters.index') }}" method="GET" class="d-flex mb-3">
                                <input class="form-control me-2" type="search" name="search" placeholder="Cari broadcaster..." aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </form>

                            {{-- New Items --}}
                            <a href="#" data-bs-toggle="modal" data-bs-target="#updatePhotoModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                +&nbsp; New
                            </a>

                            <!-- Modal untuk Tambah Data Broadcaster -->
                            <div class="modal fade" id="updatePhotoModal" tabindex="-1" aria-labelledby="updatePhotoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatePhotoLabel">Tambah Data Broadcaster</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('broadcaster.insertBroadcaster') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nama_broadcaster" class="form-label">Nama
                                                        Broadcaster</label>
                                                    <input type="text" class="form-control" id="nama_broadcaster" name="nama_broadcaster" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No HP</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal_bergabung" class="form-label">Tanggal
                                                        Bergabung</label>
                                                    <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
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
                                            Nama
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Hp
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Bergabung
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($broadcasters->currentPage() - 1) * $broadcasters->perPage() + 1;
                                    @endphp
                                    @forelse ($broadcasters as $broadcaster)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $broadcaster->nama_broadcaster }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $broadcaster->no_hp }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $broadcaster->tanggal_bergabung }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editBroadcasterModal" data-id="{{ $broadcaster->id }}" data-nama="{{ $broadcaster->nama_broadcaster }}" data-nohp="{{ $broadcaster->no_hp }}" data-tanggal="{{ $broadcaster->tanggal_bergabung }}" class="mx-3 edit-button" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('broadcaster.destroy', $broadcaster->id) }}" method="POST" style="display:inline;">
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
                                            <td colspan="3" class="text-center">
                                                <div class="alert mb-0">
                                                    Data broadcaster belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $broadcasters->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data Broadcaster -->
    <div class="modal fade" id="editBroadcasterModal" tabindex="-1" aria-labelledby="editBroadcasterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBroadcasterLabel">Edit Data Broadcaster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBroadcasterForm" action="{{ route('broadcaster.update', 0) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="edit_nama_broadcaster" class="form-label">ID</label>
                            <input type="text" class="form-control" id="edit_broadcaster_id" name="broadcaster_id"
                                value="{{ isset($broadcaster->id) ? $broadcaster->id : '' }}" disabled>
                        </div> --}}
                        <div class="mb-3">
                            <label for="edit_nama_broadcaster" class="form-label">Nama Broadcaster</label>
                            <input type="text" class="form-control" id="edit_nama_broadcaster" name="nama_broadcaster" value="{{ old('nama_broadcaster') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_no_hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" id="edit_tanggal_bergabung" name="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}" required>
                        </div>
                        {{-- <input type="hidden" id="edit_broadcaster_id" name="broadcaster_id"> --}}
                        <button type="submit" class="btn btn-primary">Update</button>
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
                    const nama = this.getAttribute('data-nama');
                    const nohp = this.getAttribute('data-nohp');
                    const tanggal = this.getAttribute('data-tanggal');

                    // Update form action URL
                    const form = document.getElementById('editBroadcasterForm');
                    form.action = `/admin/broadcaster/${id}`;

                    // Update form inputs
                    document.getElementById('edit_nama_broadcaster').value = nama;
                    document.getElementById('edit_no_hp').value = nohp;
                    document.getElementById('edit_tanggal_bergabung').value = tanggal;
                    document.getElementById('edit_broadcaster_id').value = id;
                });
            });
        });
    </script>
@endsection
