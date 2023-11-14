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
                    <form action="@if($form === 'Tambah') /tambah-rkp @elseif($form === 'Edit') /edit-rkp/{{$detail->id_rkp}} @endif" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <input type="hidden" name="id_proyek" value="@if($form === 'Edit'){{$detail->id_proyek}}@endif">
                            <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" data-style="py-0" required @if($form === 'Edit') disabled @endif>
                                @if ($form === 'Tambah')
                                    <option value="" selected disabled>-- Pilih --</option>
                                @else
                                    <option value="{{$detail->id_proyek}}">{{$detail->nama_proyek}}</option>
                                @endif
                                @foreach ($daftarProyek as $item)
                                    @if($item->status_rkp === 0)
                                        <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                    @endif
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
                            <input type="text" class="form-control @error('kode_spk') is-invalid @enderror" id="kode_spk" name="kode_spk" value="@if($form === 'Tambah'){{ old('kode_spk') }}@elseif($form === 'Edit'){{$detail->kode_spk}}@endif"  placeholder="Masukkan Kode SPK" @if($form === 'Edit') readonly @endif>
                            @error('kode_spk')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        @if ($form === 'Edit')
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 1 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review1" id="review1" @if($detail->review1 === 1) checked @endif>
                                    <label class="form-check-label" for="review1">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 2 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review2" id="review2" @if($detail->review2 === 1) checked @endif>
                                    <label class="form-check-label" for="review2">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 3 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review3" id="review3" @if($detail->review3 === 1) checked @endif>
                                    <label class="form-check-label" for="review3">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 4 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review4" id="review4" @if($detail->review4 === 1) checked @endif>
                                    <label class="form-check-label" for="review4">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 5 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review5" id="review5" @if($detail->review5 === 1) checked @endif>
                                    <label class="form-check-label" for="review5">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Review 6 (Opsional)</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="review6" id="review6" @if($detail->review6 === 1) checked @endif>
                                    <label class="form-check-label" for="review6">
                                        Check
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="note">Note</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5" placeholder="Masukkan Note">@if($form === 'Tambah'){{ old('note') }}@elseif($form === 'Edit'){{$detail->note}}@endif</textarea>
                                @error('note')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/monitoring-rkp'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection