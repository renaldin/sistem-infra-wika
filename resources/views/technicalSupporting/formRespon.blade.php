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
                    <form action="/edit-technical-supporting/{{$detail->id_technical_supporting}}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group col-md-6">
                            @if ($detail->upload_file != null)
                                <a href="/download-file-technical-supporting/{{$detail->id_technical_supporting}}" class="btn btn-sm btn-primary">
                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    File
                                </a>
                            @endif
                            @if ($detail->upload_file_hasil != null)
                                <a href="/download-file-hasil-technical-supporting/{{$detail->id_technical_supporting}}" class="btn btn-sm btn-primary">
                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    Hasil
                                </a>
                            @endif
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
                            <select class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Pilih Kode">
                                <option value="" selected disabled>Pilih Kode</option>
                                <option value="G" @if($detail->kode === 'G') selected @endif>G</option>
                                <option value="S" @if($detail->kode === 'S') selected @endif>S</option>
                                <option value="G/S" @if($detail->kode === 'G/S') selected @endif>G/S</option>
                            </select>
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
                                <label class="form-label" for="status_support">Status</label>
                                <select name="status_support" id="status_support" class="selectpicker form-control @error('status_support') is-invalid @enderror" data-style="py-0" @if($detail === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="SENT" @if($detail->status_support === "SENT") selected @endif>SENT</option>
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
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="upload_file_hasil">File Hasil (@if($detail->upload_file_hasil)Anda sudah upload file hasil @else Opsional @endif)</label>
                                <input type="file" class="form-control @error('upload_file_hasil') is-invalid @enderror" name="upload_file_hasil">
                                @error('upload_file_hasil')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
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