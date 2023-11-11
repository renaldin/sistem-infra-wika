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
                    <form action="/tambah-ki-km" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control" value="{{$user->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" value="{{$user->nip}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" data-style="py-0" required>
                                @if ($form === 'Tambah')
                                    <option value="" selected disabled>-- Pilih --</option>
                                @else
                                    <option value="{{$detail->id_proyek}}">{{$detail->nama_proyek}}</option>
                                @endif
                                @foreach ($daftarProyek as $item)
                                    <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                @endforeach
                            </select>
                            @error('id_proyek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="status_ki_km">Status</label>
                            <select class="form-control @error('status_ki_km') is-invalid @enderror" id="status_ki_km" name="status_ki_km" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Engineering" @if($form === 'Tambah' && old('status_ki_km') === 'Engineering') selected @endif>Engineering</option>
                                <option value="Non Engineering" @if($form === 'Tambah' && old('status_ki_km') === 'Non Engineering') selected @endif>Non Engineering</option>
                            </select>
                            @error('status_ki_km')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="kategori">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Best Practice" @if($form === 'Tambah' && old('kategori') === 'Best Practice') selected @endif>Best Practice</option>
                                <option value="Knowledge Management" @if($form === 'Tambah' && old('kategori') === 'Knowledge Management') selected @endif>Knowledge Management</option>
                                <option value="Karya Inovasi" @if($form === 'Tambah' && old('kategori') === 'Karya Inovasi') selected @endif>Karya Inovasi</option>
                                <option value="Lesson Learned" @if($form === 'Tambah' && old('kategori') === 'Lesson Learned') selected @endif>Lesson Learned</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="department">Department</label>
                            <select class="form-control @error('department') is-invalid @enderror" id="department" name="department" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Departemen Operasi 3" @if($form === 'Tambah' && old('department') === 'Departemen Operasi 3') selected @endif>Departemen Operasi 3</option>
                                <option value="Departemen Operasi 4" @if($form === 'Tambah' && old('department') === 'Departemen Operasi 4') selected @endif>Departemen Operasi 4</option>
                            </select>
                            @error('department')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="judul">Judul</label>
                            <textarea class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" rows="5" placeholder="Masukkan Judul">@if($form === 'Tambah'){{ old('judul') }}@elseif($form === 'Edit'){{$detail->judul}}@endif</textarea>
                            @error('judul')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/monitoring-ki-km'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection