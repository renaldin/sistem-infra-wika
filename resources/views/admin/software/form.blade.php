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
                    <form action="@if($form === 'Tambah') /tambah-software @elseif($form === 'Edit') /edit-software/{{$detail->id_software}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_software">Nama Software</label>
                            <input type="text" class="form-control @error('nama_software') is-invalid @enderror" id="nama_software" name="nama_software" value="@if($form === 'Tambah'){{ old('nama_software') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nama_software}}@endif" autofocus placeholder="Masukkan Nama Software">
                            @error('nama_software')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="fungsi">Fungsi</label>
                            <select name="fungsi" id="fungsi" class="selectpicker form-control @error('fungsi') is-invalid @enderror" data-style="py-0" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Survey Course" @if($form === "Tambah" && old("fungsi") === "Survey Course") selected @elseif($form === "Edit" && $detail->fungsi === "Survey Course") selected @endif)>Survey Course</option>
                                <option value="Modelling" @if($form === "Tambah" && old("fungsi") === "Modelling") selected @elseif($form === "Edit" && $detail->fungsi === "Modelling") selected @endif>Modelling</option>
                                <option value="Analisis" @if($form === "Tambah" && old("fungsi") === "Analisis") selected @elseif($form === "Edit" && $detail->fungsi === "Analisis") selected @endif>Analisis</option>
                                <option value="4D & 5D" @if($form === "Tambah" && old("fungsi") === "4D & 5D") selected @elseif($form === "Edit" && $detail->fungsi === "4D & 5D") selected @endif>4D & 5D</option>
                                <option value="Animasi" @if($form === "Tambah" && old("fungsi") === "Animasi") selected @elseif($form === "Edit" && $detail->fungsi === "Animasi") selected @endif>Animasi</option>
                                <option value="Microsoft Office" @if($form === "Tambah" && old("fungsi") === "Microsoft Office") selected @elseif($form === "Edit" && $detail->fungsi === "Microsoft Office") selected @endif>Microsoft Office</option>
                                <option value="Lain-lain" @if($form === "Tambah" && old("fungsi") === "Lain-lain") selected @elseif($form === "Edit" && $detail->fungsi === "Lain-lain") selected @endif>Lain-lain</option>
                            </select>
                            @error('fungsi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="selectpicker form-control @error('kategori') is-invalid @enderror" data-style="py-0" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Engineering" @if($form === "Tambah" && old("kategori") === "Engineering") selected @elseif($form === "Edit" && $detail->kategori === "Engineering") selected @endif)>Engineering</option>
                                <option value="Office" @if($form === "Tambah" && old("kategori") === "Office") selected @elseif($form === "Edit" && $detail->kategori === "Office") selected @endif>Office</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="gambar">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="preview_image" name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="gambar"></label>
                            <div class="profile-img-edit position-relative">
                                <img src="@if($form === 'Tambah') {{ asset('software/default1.jpg') }} @elseif($form === 'Edit') {{ asset('software/'.$detail->gambar) }} @endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                            </div>
                        </div>
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-software'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection