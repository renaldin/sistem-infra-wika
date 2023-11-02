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
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Kepala Seksi Proyek Kecil" @if($form === "Tambah" && old("jabatan") === "Kepala Seksi Proyek Kecil") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi Proyek Kecil") selected @endif>Kepala Seksi Proyek Kecil</option>
                                <option value="Kepala Seksi Proyek Besar" @if($form === "Tambah" && old("jabatan") === "Kepala Seksi Proyek Besar") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi Proyek Besar") selected @endif>Kepala Seksi Proyek Besar</option>
                                <option value="Kepala Seksi Produksi" @if($form === "Tambah" && old("jabatan") === "Kepala Seksi Produksi") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi Produksi") selected @endif>Kepala Seksi Produksi</option>
                                <option value="Kepala Pemeriksa Kepala Divisi" @if($form === "Tambah" && old("jabatan") === "Kepala Pemeriksa Kepala Divisi") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Pemeriksa Kepala Divisi") selected @endif>Kepala Pemeriksa Kepala Divisi</option>
                                <option value="General Manager" @if($form === "Tambah" && old("jabatan") === "General Manager") selected @elseif($form === "Edit" && $detail->jabatan === "General Manager") selected @endif>General Manager</option>
                                <option value="Direktur Utama" @if($form === "Tambah" && old("jabatan") === "Direktur Utama") selected @elseif($form === "Edit" && $detail->jabatan === "Direktur Utama") selected @endif>Direktur Utama</option>
                                <option value="Direktur" @if($form === "Tambah" && old("jabatan") === "Direktur") selected @elseif($form === "Edit" && $detail->jabatan === "Direktur") selected @endif>Direktur</option>
                                <option value="Direksi Independen" @if($form === "Tambah" && old("jabatan") === "Direksi Independen") selected @elseif($form === "Edit" && $detail->jabatan === "Direksi Independen") selected @endif>Direksi Independen</option>
                                <option value="Direksi Cucu Perusahaan" @if($form === "Tambah" && old("jabatan") === "Direksi Cucu Perusahaan") selected @elseif($form === "Edit" && $detail->jabatan === "Direksi Cucu Perusahaan") selected @endif>Direksi Cucu Perusahaan</option>
                                <option value="Direksi Asosiasi" @if($form === "Tambah" && old("jabatan") === "Direksi Asosiasi") selected @elseif($form === "Edit" && $detail->jabatan === "Direksi Asosiasi") selected @endif>Direksi Asosiasi</option>
                                <option value="Direksi Anak Perusahaan" @if($form === "Tambah" && old("jabatan") === "Direksi Anak Perusahaan") selected @elseif($form === "Edit" && $detail->jabatan === "Direksi Anak Perusahaan") selected @endif>Direksi Anak Perusahaan</option>
                                <option value="Deputy Manajer Proyek Menengah" @if($form === "Tambah" && old("jabatan") === "Deputy Manajer Proyek Menengah") selected @elseif($form === "Edit" && $detail->jabatan === "Deputy Manajer Proyek Menengah") selected @endif>Deputy Manajer Proyek Menengah</option>
                                <option value="Deputy Manajer Proyek Mega" @if($form === "Tambah" && old("jabatan") === "Deputy Manajer Proyek Mega") selected @elseif($form === "Edit" && $detail->jabatan === "Deputy Manajer Proyek Mega") selected @endif>Deputy Manajer Proyek Mega</option>
                                <option value="Deputy Manajer Proyek Besar" @if($form === "Tambah" && old("jabatan") === "Deputy Manajer Proyek Besar") selected @elseif($form === "Edit" && $detail->jabatan === "Deputy Manajer Proyek Mega") selected @endif>Deputy Manajer Proyek Mega</option>
                                <option value="Ahli Utama 2" @if($form === "Tambah" && old("jabatan") === "Ahli Utama 2") selected @elseif($form === "Edit" && $detail->jabatan === "Ahli Utama 2") selected @endif>Ahli Utama 2</option>
                                <option value="Ahli Utama 1" @if($form === "Tambah" && old("jabatan") === "Ahli Utama 1") selected @elseif($form === "Edit" && $detail->jabatan === "Ahli Utama 2") selected @endif>Ahli Utama 2</option>
                                <option value="Ahli Muda" @if($form === "Tambah" && old("jabatan") === "Ahli Muda") selected @elseif($form === "Edit" && $detail->jabatan === "Ahli Muda") selected @endif>Ahli Muda</option>
                                <option value="Ahli Madya 2" @if($form === "Tambah" && old("jabatan") === "Ahli Madya 2") selected @elseif($form === "Edit" && $detail->jabatan === "Ahli Madya 2") selected @endif>Ahli Madya 2</option>
                                <option value="Ahli Madya 1" @if($form === "Tambah" && old("jabatan") === "Ahli Madya 1") selected @elseif($form === "Edit" && $detail->jabatan === "Ahli Madya 1") selected @endif>Ahli Madya 1</option>
                                <option value="Staf" @if($form === "Tambah" && old("jabatan") === "Staf") selected @elseif($form === "Edit" && $detail->jabatan === "Staf") selected @endif>Staf</option>
                                <option value="Manajer Proyek Menengah" @if($form === "Tambah" && old("jabatan") === "Manajer Proyek Menengah") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Proyek Menengah") selected @endif>Manajer Proyek Menengah</option>
                                <option value="Manajer Proyek Mega" @if($form === "Tambah" && old("jabatan") === "Manajer Proyek Mega") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Proyek Mega") selected @endif>Manajer Proyek Mega</option>
                                <option value="Manajer Proyek Kecil" @if($form === "Tambah" && old("jabatan") === "Manajer Proyek Kecil") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Proyek Mega") selected @endif>Manajer Proyek Mega</option>
                                <option value="Manajer Proyek Besar" @if($form === "Tambah" && old("jabatan") === "Manajer Proyek Besar") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Proyek Besar") selected @endif>Manajer Proyek Besar</option>
                                <option value="Manajer Konstruksi Proyek Mega" @if($form === "Tambah" && old("jabatan") === "Manajer Konstruksi Proyek Mega") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Proyek Besar") selected @endif>Manajer Proyek Besar</option>
                                <option value="Manajer Konstruksi Proyek Besar" @if($form === "Tambah" && old("jabatan") === "Manajer Konstruksi Proyek Besar") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Konstruksi Proyek Besar") selected @endif>Manajer Konstruksi Proyek Besar</option>
                                <option value="Manajer Divisi" @if($form === "Tambah" && old("jabatan") === "Manajer Divisi") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Divisi") selected @endif>Manajer Divisi</option>
                                <option value="Manajer Departemen" @if($form === "Tambah" && old("jabatan") === "Manajer Departemen") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Departemen") selected @endif>Manajer Departemen</option>
                                <option value="Manajer Biro Operasi" @if($form === "Tambah" && old("jabatan") === "Manajer Biro Operasi") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Biro Operasi") selected @endif>Manajer Biro Operasi</option>
                                <option value="Manajer Biro Korporasi Assosiasi" @if($form === "Tambah" && old("jabatan") === "Manajer Biro Korporasi Assosiasi") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Biro Korporasi Assosiasi") selected @endif>Manajer Biro Korporasi Assosiasi</option>
                                <option value="Manajer Biro Korporasi" @if($form === "Tambah" && old("jabatan") === "Manajer Biro Korporasi") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Biro Korporasi") selected @endif>Manajer Biro Korporasi</option>
                                <option value="Manajer Bidang Proyek Mega" @if($form === "Tambah" && old("jabatan") === "Manajer Bidang Proyek Mega") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Bidang Proyek Mega") selected @endif>Manajer Bidang Proyek Mega</option>
                                <option value="Manajer Bidang Departemen" @if($form === "Tambah" && old("jabatan") === "Manajer Bidang Departemen") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Bidang Departemen") selected @endif>Manajer Bidang Departemen</option>
                                <option value="Manajer Bidang" @if($form === "Tambah" && old("jabatan") === "Manajer Bidang") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer Bidang") selected @endif>Manajer Bidang</option>
                                <option value="Manajer" @if($form === "Tambah" && old("jabatan") === "Manajer") selected @elseif($form === "Edit" && $detail->jabatan === "Manajer") selected @endif>Manajer</option>
                                <option value="Koordinator" @if($form === "Tambah" && old("jabatan") === "Koordinator") selected @elseif($form === "Edit" && $detail->jabatan === "Koordinator") selected @endif>Koordinator</option>
                                <option value="Komisaris" @if($form === "Tambah" && old("jabatan") === "Head Office") selected @elseif($form === "Edit" && $detail->jabatan === "Head Office") selected @endif>Komisaris</option>
                                <option value="Kepala Seksi Proyek Menengah" @if($form === "Tambah" && old("jabatan") === "Kepala Seksi Proyek Menengah") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi Proyek Menengah") selected @endif>Kepala Seksi Proyek Menengah</option>
                                <option value="Kepala Seksi Proyek Mega" @if($form === "Tambah" && old("jabatan") === "Kepala Seksi Proyek Mega") selected @elseif($form === "Edit" && $detail->jabatan === "Kepala Seksi Proyek Mega") selected @endif>Kepala Seksi Proyek Mega</option>
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