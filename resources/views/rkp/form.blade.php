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
                            <label class="form-label" for="kode_spk">Kode SPK</label>
                            <textarea class="form-control @error('kode_spk') is-invalid @enderror" id="kode_spk" name="kode_spk" placeholder="Masukkan Kode SPK">@if($form === 'Tambah'){{ old('kode_spk') }}@elseif($form === 'Edit'){{$detail->judul}}@endif</textarea>
                            @error('kode_spk')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/review-rkp'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection