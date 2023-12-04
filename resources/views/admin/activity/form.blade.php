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
                    <form action="@if($form == 'Tambah')/tambah-activities @else/edit-activities/{{$detail->id_activity}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" @if($form === 'Tambah') value="{{old('judul')}}" @else value="{{$detail->judul}}" @endif id="judul" name="judul" placeholder="Masukkan Judul" required>
                                @error('judul')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="is_active">Is Active</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="is_active" type="checkbox" id="flexSwitchCheckDefault" @if($form === 'Edit' && $detail->is_active == 1) checked @endif>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="gambar">Gambar <small class="text-danger text-small">* png/jpg/jpeg</small></label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="preview_image" name="gambar" placeholder="Masukkan Gambar" @if($form === 'Tambah') required @endif>
                                @error('gambar')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="foto_user"></label>
                                <div class="profile-img-edit position-relative">
                                    <img src="@if($form === 'Tambah'){{ asset('activities/default1.jpg') }}@else{{ asset('activities/'.$detail->gambar) }}@endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label" for="no_urut">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="editor1" cols="30" rows="10" placeholder="Masukkan Deskripsi" required>@if($form === 'Tambah'){{old('deskripsi')}}@else{{$detail->deskripsi}}@endif</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/data-activities'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection