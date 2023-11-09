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
                    <form action="/edit-technical-supporting/{{$detail->id_technical_supporting}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tanggal Submit</label>
                            <input type="text" class="form-control" value="{{$detail->tanggal_submit}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Kendala Teknis</label>
                            <textarea class="form-control" rows="5" readonly>{{$detail->kendala}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">PIC</label>
                            <input type="hidden" class="form-control" value="{{$user->id_user}}">
                            <input type="text" class="form-control" value="{{$user->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nomor_laporan">Nomor Laporan</label>
                            <input type="text" class="form-control @error('nomor_laporan') is-invalid @enderror" id="nomor_laporan" name="nomor_laporan" value="@if($detail->nomor_laporan === null){{ old('nomor_laporan') }}@else{{$detail->nomor_laporan}}@endif"  placeholder="Masukkan Nomor Laporan">
                            @error('nomor_laporan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="kode">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="@if($detail->kode === null){{ old('kode') }}@else{{$detail->kode}}@endif"  placeholder="Masukkan Kode">
                            @error('kode')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="topik">Topik</label>
                            <input type="text" class="form-control @error('topik') is-invalid @enderror" id="topik" name="topik" value="@if($detail->topik === null){{ old('topik') }}@else{{$detail->topik}}@endif"  placeholder="Masukkan Topik">
                            @error('topik')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if ($detail->is_respon !== 0)
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_selesai">Tanggal Selesai (Boleh Kosong)</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="@if($detail->tanggal_selesai === null){{ old('tanggal_selesai') }}@else{{$detail->tanggal_selesai}}@endif"  placeholder="Masukkan Tanggal Selesai">
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="note">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="@if($detail->note === null){{ old('note') }}@else{{$detail->note}}@endif"  placeholder="Masukkan Note">
                                @error('note')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="dokumen">Dokumen (Link)</label>
                                <input type="text" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen" value="@if($detail->dokumen === null){{ old('dokumen') }}@else{{$detail->dokumen}}@endif"  placeholder="Masukkan Dokumen">
                                @error('dokumen')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="form-label" for="status_support">Status</label>
                            <select name="status_support" id="status_support" class="selectpicker form-control @error('status_support') is-invalid @enderror" data-style="py-0" @if($detail === 'Detail') disabled @endif required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="SENT" @if($detail->status_support === "SENT") selected @endif)>SENT</option>
                                <option value="HOLD" @if($detail->status_support === "HOLD") selected @endif>HOLD</option>
                                <option value="ON GOING" @if($detail->status_support === "ON GOING") selected @endif>ON GOING</option>
                                <option value="OPEN" @if($detail->status_support === "OPEN") selected @endif>OPEN</option>
                                <option value="NO DATA" @if($detail->status_support === "NO DATA") selected @endif>NO DATA</option>
                            </select>
                            @error('status_support')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    {{-- Component: tombolForm --}}
                    @include('components.tombolForm', ['linkKembali' => '/update-technical-supporting'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection