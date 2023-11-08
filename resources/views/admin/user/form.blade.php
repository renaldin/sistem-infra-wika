@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form === 'Tambah') /tambah-user @elseif($form === 'Edit') /edit-user/{{$detail->id_user}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_user">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" name="nama_user" value="@if($form === 'Tambah'){{ old('nama_user') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nama_user}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Lengkap ">
                            @error('nama_user')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nip">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="@if($form === 'Tambah'){{ old('nip') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nip}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan nip">
                            @error('nip')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="telepon">Nomor Telepon</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="@if($form === 'Tambah'){{ old('telepon') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->telepon}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor Telepon">
                            @error('telepon')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" @if($form === 'Detail') disabled @endif placeholder="Masukkan Password ">
                            @error('password')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto_user') is-invalid @enderror" id="preview_image" name="foto_user" @if($form === 'Detail') disabled @endif>
                            @error('foto_user')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="foto_user"></label>
                            <div class="profile-img-edit position-relative">
                                <img src="@if($form === 'Tambah') {{ asset('foto_user/default1.jpg') }} @elseif($form === 'Edit' || $form === 'Detail') {{ asset('foto_user/'.$detail->foto_user) }} @endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="selectpicker form-control @error('jabatan') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Direksi" @if($form === "Tambah" && old("jabatan") === "Direksi") selected @elseif($form === "Edit" && $detail->jabatan === "Direksi") selected @endif>Direksi</option>
                                <option value="Senior Vice President" @if($form === "Tambah" && old("jabatan") === "Senior Vice President") selected @elseif($form === "Edit" && $detail->jabatan === "Senior Vice President") selected @endif>Senior Vice President</option>
                                <option value="General Manager of Operation 3" @if($form === "Tambah" && old("jabatan") === "General Manager of Operation 3") selected @elseif($form === "Edit" && $detail->jabatan === "General Manager of Operation 3") selected @endif>General Manager of Operation 3</option>
                                <option value="General Manager of Operation 4" @if($form === "Tambah" && old("jabatan") === "General Manager of Operation 4") selected @elseif($form === "Edit" && $detail->jabatan === "General Manager of Operation 4") selected @endif>General Manager of Operation 4</option>
                                <option value="Deputy General Manager operasi 3" @if($form === "Tambah" && old("jabatan") === "Deputy General Manager operasi 3") selected @elseif($form === "Edit" && $detail->jabatan === "Deputy General Manager operasi 3") selected @endif>Deputy General Manager operasi 3</option>
                                <option value="Deputy General Manager operasi 4" @if($form === "Tambah" && old("jabatan") === "Deputy General Manager operasi 4") selected @elseif($form === "Edit" && $detail->jabatan === "Deputy General Manager operasi 4") selected @endif>Deputy General Manager operasi 4</option>
                                <option value="Manager of Engineering" @if($form === "Tambah" && old("jabatan") === "Manager of Engineering") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Engineering") selected @endif>Manager of Engineering</option>
                                <option value="Manager of Finance" @if($form === "Tambah" && old("jabatan") === "Manager of Finance") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Finance") selected @endif>Manager of Finance</option>
                                <option value="Manager of Quality, Healty, Safety and Environment" @if($form === "Tambah" && old("jabatan") === "Manager of Quality, Healty, Safety and Environment") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Quality, Healty, Safety and Environment") selected @endif>Manager of Quality, Healty, Safety and Environment</option>
                                <option value="Manager of Contract Management" @if($form === "Tambah" && old("jabatan") === "Manager of Contract Management") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Contract Management") selected @endif>Manager of Contract Management</option>
                                <option value="Manager of Project Control and Planning" @if($form === "Tambah" && old("jabatan") === "Manager of Project Control and Planning") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Project Control and Planning") selected @endif>Manager of Project Control and Planning</option>
                                <option value="Manager of Human Capital" @if($form === "Tambah" && old("jabatan") === "Manager of Human Capital") selected @elseif($form === "Edit" && $detail->jabatan === "Manager of Human Capital") selected @endif>Manager of Human Capital</option>
                                <option value="Coordinator" @if($form === "Tambah" && old("jabatan") === "Coordinator") selected @elseif($form === "Edit" && $detail->jabatan === "Coordinator") selected @endif>Coordinator</option>
                                <option value="Staff Corporate" @if($form === "Tambah" && old("jabatan") === "Staff Corporate") selected @elseif($form === "Edit" && $detail->jabatan === "Staff Corporate") selected @endif>Staff Corporate</option>
                                <option value="Project Manager" @if($form === "Tambah" && old("jabatan") === "Project Manager") selected @elseif($form === "Edit" && $detail->jabatan === "Project Manager") selected @endif>Project Manager</option>
                                <option value="Kepala Seksi " @if($form === "Tambah" && old("jabatan") === "Kepala Seksi ") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi ") selected @endif>Kepala Seksi </option>
                                <option value="Staff proyek" @if($form === "Tambah" && old("jabatan") === "Staff proyek") selected @elseif($form === "Edit" && $detail->jabatan === "Staff proyek") selected @endif>Staff proyek</option>
                                <option value="Intern" @if($form === "Tambah" && old("jabatan") === "Intern") selected @elseif($form === "Edit" && $detail->jabatan === "Intern") selected @endif>Intern</option>
                            </select>
                            @error('jabatan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="role">Role</label>
                            <select name="role" id="role" class="selectpicker form-control @error('role') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Admin" @if($form === "Tambah" && old("role") === "Admin") selected @elseif($form === "Edit" && $detail->role === "Admin") selected @endif)>Admin</option>
                                <option value="Tim Proyek" @if($form === "Tambah" && old("role") === "Tim Proyek") selected @elseif($form === "Edit" && $detail->role === "Tim Proyek") selected @endif>Tim Proyek</option>
                                <option value="Head Office" @if($form === "Tambah" && old("role") === "Head Office") selected @elseif($form === "Edit" && $detail->role === "Head Office") selected @endif>Head Office</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- @if ($form === 'Edit' && $detail->role === 'Head Office' && $detail->fungsi !== null)
                            <div class="form-group col-md-6 fungsi2">
                                <label class="form-label" for="fungsi">Fungsi</label>
                                <select name="fungsi" id="fungsi" class="selectpicker form-control" data-style="py-0">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Desain & Analisis" @if($form === "Tambah" && old("role") === "Desain & Analisis") selected @elseif($form === "Edit" && $detail->role === "Desain & Analisis") selected @endif)>Desain & Analisis</option>
                                    <option value="Bim & Digitalisasi Engineering" @if($form === "Tambah" && old("role") === "Bim & Digitalisasi Engineering") selected @elseif($form === "Edit" && $detail->role === "Bim & Digitalisasi Engineering") selected @endif>Bim & Digitalisasi Engineering</option>
                                    <option value="Sistem Engineering & Lean Construction" @if($form === "Tambah" && old("role") === "Sistem Engineering & Lean Construction") selected @elseif($form === "Edit" && $detail->role === "Sistem Engineering & Lean Construction") selected @endif>Sistem Engineering & Lean Construction</option>
                                    <option value="Manager of Engineering" @if($form === "Tambah" && old("role") === "Manager of Engineering") selected @elseif($form === "Edit" && $detail->role === "Manager of Engineering") selected @endif>Manager of Engineering</option>
                                    <option value="Expert of Engineering" @if($form === "Tambah" && old("role") === "Expert of Engineering") selected @elseif($form === "Edit" && $detail->role === "Expert of Engineering") selected @endif>Expert of Engineering</option>
                                </select>
                            </div>
                        @else
                            <div class="fungsi">

                            </div>
                        @endif --}}
                        <div class="fungsi">

                        </div>
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-user'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection