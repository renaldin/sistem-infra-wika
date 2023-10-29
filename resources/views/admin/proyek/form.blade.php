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
                    <form action="@if($form === 'Tambah') /tambah-proyek @elseif($form === 'Edit') /edit-proyek/{{$detail->id_proyek}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_proyek">Nama Proyek</label>
                            <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" value="@if($form === 'Tambah'){{ old('nama_proyek') }}@elseif($form === 'Edit'){{$detail->nama_proyek}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Lengkap ">
                            @error('nama_proyek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="@if($form === 'Tambah'){{ old('tanggal') }}@elseif($form === 'Edit'){{$detail->tanggal}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tipe_konstruksi">Tipe Konstruksi</label>
                            <select class="form-control @error('tipe_konstruksi') is-invalid @enderror" id="tipe_konstruksi" name="tipe_konstruksi" @if($form === 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Tipe Konstruksi --</option>
                                <option value="Road & Bridge" @if($form === 'Tambah' && old('tipe_konstruksi') === 'Road & Bridge') selected @elseif($form === 'Edit' && $detail->tipe_konstruksi === 'Road & Bridge') selected @endif>Road & Bridge</option>
                                <option value="Water Resource" @if($form === 'Tambah' && old('tipe_konstruksi') === 'Water Resource') selected @elseif($form === 'Edit' && $detail->tipe_konstruksi === 'Water Resource') selected @endif>Water Resource</option>
                                <option value="Dredging & Land Clearing" @if($form === 'Tambah' && old('tipe_konstruksi') === 'Dredging & Land Clearing') selected @elseif($form === 'Edit' && $detail->tipe_konstruksi === 'Dredging & Land Clearing') selected @endif>Dredging & Land Clearing</option>
                            </select>
                            @error('tipe_konstruksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label" for="prioritas">Prioritas</label>
                            <select class="form-control @error('prioritas') is-invalid @enderror" id="prioritas" name="prioritas" @if($form === 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Prioritas --</option>
                                <option value="Prioritas 1" @if($form === 'Tambah' && old('prioritas') === 'Prioritas 1') selected @elseif($form === 'Edit' && $detail->prioritas === 'Prioritas 1') selected @endif>Prioritas 1</option>
                                <option value="Prioritas 2" @if($form === 'Tambah' && old('prioritas') === 'Prioritas 2') selected @elseif($form === 'Edit' && $detail->prioritas === 'Prioritas 2') selected @endif>Prioritas 2</option>
                                <option value="Prioritas 3" @if($form === 'Tambah' && old('prioritas') === 'Prioritas 3') selected @elseif($form === 'Edit' && $detail->prioritas === 'Prioritas 3') selected @endif>Prioritas 3</option>
                                <option value="Bukan Prioritas" @if($form === 'Tambah' && old('prioritas') === 'Bukan Prioritas') selected @elseif($form === 'Edit' && $detail->prioritas === 'Bukan Prioritas') selected @endif>Bukan Prioritas</option>
                            </select>
                            @error('prioritas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" @if($form === 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Status --</option>
                                <option value="Proyek Besar" @if($form === 'Tambah' && old('status') === 'Proyek Besar') selected @elseif($form === 'Edit' && $detail->status === 'Proyek Besar') selected @endif>Proyek Besar</option>
                                <option value="Proyek Menengah" @if($form === 'Tambah' && old('status') === 'Proyek Menengah') selected @elseif($form === 'Edit' && $detail->status === 'Proyek Menengah') selected @endif>Proyek Menengah</option>
                                <option value="Proyek Kecil" @if($form === 'Tambah' && old('status') === 'Proyek Kecil') selected @elseif($form === 'Edit' && $detail->status === 'Proyek Kecil') selected @endif>Proyek Kecil</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label" for="coordinat">Coordinat</label>
                            <input type="text" class="form-control @error('coordinat') is-invalid @enderror" id="coordinat" name="coordinat" value="@if($form === 'Tambah'){{ old('coordinat') }}@elseif($form === 'Edit'){{$detail->coordinat}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor coordinat">
                            @error('coordinat')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="role">Tim Proyek</label>
                            <select name="id_tim_proyek" id="id_tim_proyek" class="selectpicker form-control @error('id_tim_proyek') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif>
                                @if ($form === 'Tambah')
                                    <option value="" selected disabled>-- Pilih --</option>    
                                @elseif ($form === 'Edit')
                                    <option value="{{$detail->id_tim_proyek}}">{{$detail->nama_tim_proyek}}</option>
                                @endif
                                @foreach($daftarTimProyek as $item)
                                    <option value="{{$item->id_tim_proyek}}">{{$item->nama_tim_proyek}}</option>
                                @endforeach
                            </select>
                            @error('id_tim_proyek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/daftar-proyek" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection