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
                            <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="@if($form === 'Tambah'){{ old('nip') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nip}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan nip">
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
                            <label class="form-label" for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="selectpicker form-control @error('jabatan') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif>
                                @if ($form === 'Tambah')
                                    <option value="">-- Pilih --</option>    
                                @elseif ($form === 'Edit' || $form === 'Detail')
                                    <option value="{{$detail->jabatan}}">{{$detail->jabatan}}</option>
                                @endif
                                <option value="Kepala Seksi Proyek Kecil">Kepala Seksi Proyek Kecil</option>
                                <option value="Kepala Seksi Proyek Besar">Kepala Seksi Proyek Besar</option>
                                <option value="Kepala Seksi Produksi">Kepala Seksi Produksi</option>
                                <option value="Kepala Pemeriksa">Kepala Pemeriksa</option>
                                <option value="Kepala Divisi">Kepala Divisi</option>
                                <option value="General Manager">General Manager</option>
                                <option value="Direktur Utama">Direktur Utama</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Direksi Independen">Direksi Independen</option>
                                <option value="Direksi Cucu Perusahaan">Direksi Cucu Perusahaan</option>
                                <option value="Direksi Asosiasi">Direksi Asosiasi</option>
                                <option value="Direksi Anak Perusahaan Deputy Manajer Proyek Menengah">Direksi Anak Perusahaan Deputy Manajer Proyek Menengah</option>
                                <option value="Deputy Manajer Proyek Mega Deputy Manajer Proyek Besar">Deputy Manajer Proyek Mega Deputy Manajer Proyek Besar</option>
                                <option value="Ahli Utama 2 Ahli Utama 1">Ahli Utama 2 Ahli Utama 1</option>
                                <option value="Ahli Muda">Ahli Muda</option>
                                <option value="Ahli Madya 2">Ahli Madya 2</option>
                                <option value="Ahli Madya 1">Ahli Madya 1</option>
                                <option value="Staf">Staf</option>
                                <option value="Manajer Proyek Menengah">Manajer Proyek Menengah</option>
                                <option value="Manajer Proyek Mega Manajer Proyek Kecil">Manajer Proyek Mega Manajer Proyek Kecil</option>
                                <option value="Manajer Proyek Besar Manajer Konstruksi Proyek Mega">Manajer Proyek Besar Manajer Konstruksi Proyek Mega</option>
                                <option value="Manajer Konstruksi Proyek Besar">Manajer Konstruksi Proyek Besar</option>
                                <option value="Manajer Divisi">Manajer Divisi</option>
                                <option value="Manajer Departemen">Manajer Departemen</option>
                                <option value="Manajer Biro Operasi">Manajer Biro Operasi</option>
                                <option value="Manajer Biro Korporasi Assosiasi">Manajer Biro Korporasi Assosiasi</option>
                                <option value="Manajer Biro Korporasi">Manajer Biro Korporasi</option>
                                <option value="Manajer Bidang Proyek Mega">Manajer Bidang Proyek Mega</option>
                                <option value="Manajer Bidang Departemen">Manajer Bidang Departemen</option>
                                <option value="Manajer Bidang">Manajer Bidang</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Koordinator">Koordinator</option>
                                <option value="Komisaris">Komisaris</option>
                                <option value="Kepala Seksi Proyek Menengah">Kepala Seksi Proyek Menengah</option>
                                <option value="Kepala Seksi Proyek Mega">Kepala Seksi Proyek Mega</option>
                            </select>
                            @error('jabatan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="role">Role</label>
                            <select name="role" id="role" class="selectpicker form-control @error('role') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif>
                                @if ($form === 'Tambah')
                                    <option value="">-- Pilih --</option>    
                                @elseif ($form === 'Edit' || $form === 'Detail')
                                    <option value="{{$detail->role}}">{{$detail->role}}</option>
                                @endif
                                <option value="Admin">Admin</option>
                                <option value="Tim Proyek">Tim Proyek</option>
                                <option value="Head Office">Head Office</option>
                            </select>
                            @error('role')
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
                    </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/daftar-user" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection