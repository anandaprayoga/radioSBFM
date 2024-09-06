@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mb-3">Data Admin</h5>
                            </div>
                            <!-- Form and New Button -->
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                {{-- Search --}}
                                <form action="{{ route('admins.index') }}" method="GET" class="d-flex mb-3">
                                    <input style="height: 40px;" class="form-control me-2" type="search" name="search" placeholder="Cari admin..." aria-label="Search" value="{{ request('search') }}">
                                    <button style="height: 40px;" class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                                {{-- New Items --}}
                                <a style="height: 40px;" href="#" data-bs-toggle="modal" data-bs-target="#updateAdminModal" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                                    +&nbsp; New
                                </a>
                            </div>
                            

                            

                            <!-- Modal untuk Tambah Data Admin -->
                            <div class="modal fade" id="updateAdminModal" tabindex="-1" aria-labelledby="updateAdminLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateAdminLabel">Tambah Data Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.insertAdmin') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">
                                                        Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">
                                                        Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_admin" class="form-label">
                                                        Nama</label>
                                                    <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">
                                                        Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">
                                                        No HP</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">
                                                        Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="about_me" class="form-label">
                                                        Tentang</label>
                                                    <input type="text" class="form-control" id="about_me" name="about_me">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="peran" class="form-label">
                                                        Peran</label>
                                                    <select class="form-control" name="peran" id="peran" required>
                                                        <option value="">Pilih Peran</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Superadmin">Superadmin</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="profile_image" class="form-label">
                                                        Foto Admin</label>
                                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
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
                                @foreach ($errors->all() as $error)
                                    {{ $error }} <br>
                                @endforeach
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Foto
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Username
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No HP
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tentang
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Peran
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($admins->currentPage() - 1) * $admins->perPage() + 1;
                                    @endphp
                                    @forelse ($admins as $admin)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/' . $admin->profile_image) }}" width="100">
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->username }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->nama_admin }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->email }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->no_hp }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->alamat }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->about_me }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $admin->peran }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editAdminModal" data-id="{{ $admin->id }}" data-nama_admin="{{ $admin->nama_admin }}" data-profile_image="{{ $admin->profile_image }}" data-username="{{ $admin->username }}" data-password="{{ $admin->password }}" data-email="{{ $admin->email }}" data-no_hp="{{ $admin->no_hp }}" data-alamat="{{ $admin->alamat }}" data-about_me="{{ $admin->about_me }}" data-peran="{{ $admin->peran }}" class="mx-3 edit-button" data-bs-toggle="tooltip" data-bs-original-title="Edit Admin">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;">
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
                                                    Data admin belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                {{ $admins->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Data Kategori -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminLabel">Edit Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAdminForm" action="{{ route('admin.update', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username" value="{{ old('username', $admin->username) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="edit_password" name="password" value="">
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_admin" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="edit_nama_admin" name="nama_admin" value="{{ old('nama_admin', $admin->nama_admin) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" value="{{ old('email', $admin->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_no_hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" value="{{ old('no_hp', $admin->no_hp) }}">
                        </div>
                        <div class="mb-3">
                            <label for="edit_alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" name="alamat" value="{{ old('alamat', $admin->alamat) }}">
                        </div>
                        <div class="mb-3">
                            <label for="edit_about_me" class="form-label">Tentang</label>
                            <input type="text" class="form-control" id="edit_about_me" name="about_me" value="{{ old('about_me', $admin->about_me) }}">
                        </div>
                        <div class="mb-3">
                            <label for="edit_peran" class="form-label">Peran</label>
                            <select class="form-control" name="peran" id="peran" required>
                                <option value="">Pilih Peran</option>
                                <option value="Admin" {{ old('peran', $admin->peran ?? '') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Superadmin" {{ old('peran', $admin->peran ?? '') == 'Superadmin' ? 'selected' : '' }}>Superadmin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_profile_image" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="edit_profile_image" name="profile_image" value="{{ old('profile_image') }}">
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
                    const username = this.getAttribute('data-username');
                    const nama_admin = this.getAttribute('data-nama_admin');
                    const email = this.getAttribute('data-email');
                    const no_hp = this.getAttribute('data-no_hp');
                    const alamat = this.getAttribute('data-alamat');
                    const about_me = this.getAttribute('data-about_me');
                    const peran = this.getAttribute('data-peran');
                    const profile_image = this.getAttribute('data-profile_image');
                    const password = this.getAttribute('data-password');

                    // Update form action URL
                    const form = document.getElementById('editAdminForm');
                    form.action = `/admin/admin/${id}`;

                    // Update form inputs
                    document.getElementById('edit_admin_id').value = id;
                    document.getElementById('edit_username').value = username;
                    document.getElementById('edit_password').value = password;
                    document.getElementById('edit_nama_admin').value = nama_admin;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('edit_no_hp').value = no_hp;
                    document.getElementById('edit_alamat').value = alamat;
                    document.getElementById('edit_about_me').value = about_me;
                    document.getElementById('edit_peran').value = peran;
                    document.getElementById('edit_profile_image').value = profile_image;
                });
            });
        });
    </script>
@endsection
