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
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->profile_image ? Storage::url(auth()->user()->profile_image) : asset('assets/img/blank-profile.png') }}"
                            alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#updatePhotoModal"
                            class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            @ {{ auth()->user()->username }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ __('Admin') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/admin/user-profile" method="POST" role="form text-left">
                    @csrf
                    @if ($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                            {{ $errors->first() }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Nama Lengkap') }}</label>
                                <div class="@error('user.nama_admin')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text"
                                        value="{{ old('nama_admin', Auth::user()->nama_admin) }}" placeholder="Name"
                                        id="nama_admin" name="nama_admin">
                                    @error('nama_admin')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                        placeholder="Email" id="email" name="email">
                                    @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('No HP') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->no_hp }}" type="tel"
                                        placeholder="08XXXXXXXXXX" id="number" name="no_hp"
                                        value="{{ auth()->user()->phone }}">
                                    @error('no_hp')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Alamat') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ auth()->user()->alamat }}"
                                        placeholder="Alamat" id="name" name="alamat"
                                        value="{{ auth()->user()->location }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'About Me' }}</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" value="{{ auth()->user()->alamat }}" id="about" rows="3"
                                placeholder="Say something about yourself"
                                name="about_me">{{ auth()->user()->about_me }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit"
                            class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Modal untuk Update Foto -->
<div class="modal fade" id="updatePhotoModal" tabindex="-1" aria-labelledby="updatePhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePhotoLabel">Update Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="photo" class="form-label">Pilih Foto Baru
                            <br>
                            <a style="font-size: 10px; color: blue;">Format file: jpeg, png, jpeg</a>
                            <br>
                            <a style="font-size: 10px; color: blue;">Max. Resolusi: 1000px</a>
                        </label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Foto</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection