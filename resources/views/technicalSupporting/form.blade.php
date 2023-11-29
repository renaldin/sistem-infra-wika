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
                    <form action="@if($form === 'Tambah') /tambah-technical-supporting @elseif($form === 'Edit') /edit-technical-supporting/{{$detail->id_technical_supporting}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                            <label class="form-label" for="tanggal_submit">Tanggal Submit</label>
                            <input type="date" class="form-control @error('tanggal_submit') is-invalid @enderror" id="tanggal_submit" name="tanggal_submit" value="@if($form === 'Tambah'){{ old('tanggal_submit') }}@elseif($form === 'Edit'){{$detail->tanggal_submit}}@endif"  placeholder="Masukkan Tanggal Submit">
                            @error('tanggal_submit')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="kendala">Kendala Teknis</label>
                            <textarea class="form-control @error('kendala') is-invalid @enderror" id="kendala" name="kendala" rows="5" placeholder="Masukkan Kendala">@if($form === 'Tambah'){{ old('kendala') }}@elseif($form === 'Edit'){{$detail->kendala}}@endif</textarea>
                            @error('kendala')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="upload_file">File</label>
                            <input type="file" class="form-control @error('upload_file') is-invalid @enderror" name="upload_file" required>
                            @error('upload_file')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                            {{-- <label class="form-label" for="dokumen">Unggah File</label>
                            <input type="file" class="form-control-file @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen">
                            @error('dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>                        
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/monitoring-technical-supporting'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection