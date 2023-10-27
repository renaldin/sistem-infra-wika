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
                    <form action="@if($form === 'Tambah') /tambah-projek @elseif($form === 'Edit') /edit-projek/{{$detail->id_projek}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_projek">Nama Projek</label>
                            <input type="text" class="form-control @error('nama_projek') is-invalid @enderror" id="nama_projek" name="nama_projek" value="@if($form === 'Tambah'){{ old('nama_projek') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nama_projek}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Lengkap ">
                            @error('nama_projek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="@if($form === 'Tambah'){{ old('tanggal') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->tanggal}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tipe_konstruksi">Tipe Konstruksi</label>
                            <input type="text" class="form-control @error('tipe_konstruksi') is-invalid @enderror" id="tipe_konstruksi" name="tipe_konstruksi" value="@if($form === 'Tambah'){{ old('tipe_konstruksi') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->tipe_konstruksi}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor tipe_konstruksi">
                            @error('tipe_konstruksi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="prioritas">Prioritas</label>
                            <input type="text" class="form-control @error('prioritas') is-invalid @enderror" id="prioritas" name="prioritas" value="@if($form === 'Tambah'){{ old('prioritas') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->prioritas}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor prioritas">
                            @error('prioritas')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="status">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="@if($form === 'Tambah'){{ old('status') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->status}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor status">
                            @error('status')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="coordinat">Coordinat</label>
                            <input type="text" class="form-control @error('coordinat') is-invalid @enderror" id="coordinat" name="coordinat" value="@if($form === 'Tambah'){{ old('coordinat') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->coordinat}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor coordinat">
                            @error('coordinat')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="role">Kesie Eng</label>
                            <select name="id_kesie_eng" id="id_kesie_eng" class="selectpicker form-control @error('id_kesie_eng') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif>
                                @if ($form === 'Tambah')
                                    <option value="">-- Pilih --</option>    
                                @elseif ($form === 'Edit' || $form === 'Detail')
                                    <option value="{{$detail->id_kesie_eng}}">{{$detail->nama_user}}</option>
                                @endif
                                @foreach($daftarUser as $item)
                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                @endforeach
                            </select>
                            @error('id_kesie_eng')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/daftar-projek" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection