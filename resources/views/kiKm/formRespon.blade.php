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
                    <form action="/edit-ki-km/{{$detail->id_ki_km}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{$detail->status}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" value="{{$detail->kategori}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Penulis/PIC</label>
                            <input type="text" class="form-control" value="{{$detail->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" value="{{$detail->nip}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" value="{{$detail->department}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Judul</label>
                            <textarea class="form-control" rows="5" readonly>{{$detail->judul}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            @if ($detail->upload_file != null)
                                <a href="/download-file-ki-km/{{$detail->id_ki_km}}" class="btn btn-sm btn-primary">
                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    File
                                </a>
                            @endif
                            @if ($detail->upload_file_hasil != null)
                                <a href="/download-file-hasil-ki-km/{{$detail->id_ki_km}}" class="btn btn-sm btn-primary">
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
                            <label class="form-label" for="tanggal_upload">Tanggal Upload</label>
                            <input type="date" class="form-control @error('tanggal_upload') is-invalid @enderror" id="tanggal_upload" name="tanggal_upload" value="{{ now()->format('Y-m-d') }}" readonly>
                            @error('tanggal_upload')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Approval (Opsional)</label>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="proses_penulisan" id="proses_penulisan" @if($detail->proses_penulisan === 1) checked @endif>
                                <label class="form-check-label" for="proses_penulisan">
                                    Proses Penulisan
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="terupload_kmspace" id="terupload_kmspace" @if($detail->terupload_kmspace === 1) checked @endif>
                                <label class="form-check-label" for="terupload_kmspace">
                                   Terupload KM Space
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="approval_atasan" id="approval_atasan" @if($detail->approval_atasan === 1) checked @endif>
                                <label class="form-check-label" for="approval_atasan">
                                    Atasan Langsung
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="approval_pic_divisi" id="approval_pic_divisi" @if($detail->approval_pic_divisi === 1) checked @endif>
                                <label class="form-check-label" for="approval_pic_divisi">
                                    PIC KM DIVISI/AP
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="approval_pic_pusat" id="approval_pic_pusat" @if($detail->approval_pic_pusat === 1) checked @endif>
                                <label class="form-check-label" for="approval_pic_pusat">
                                    PIC KM PUSAT
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="approval_published" id="approval_published" @if($detail->approval_published === 1) checked @endif>
                                <label class="form-check-label" for="approval_published">
                                    Published
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal_published">Tanggal Published (Opsional)</label>
                            <input type="date" class="form-control @error('tanggal_published') is-invalid @enderror" id="tanggal_published" name="tanggal_published" value="@if($detail->tanggal_published === null){{ old('tanggal_published') }}@else{{$detail->tanggal_published}}@endif"  placeholder="Masukkan Tanggal Published">
                            @error('tanggal_published')
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
                            {{-- <label class="form-label" for="note">Note</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="@if($detail->note === null){{ old('note') }}@else{{$detail->note}}@endif"  placeholder="Masukkan Note">
                            @error('note')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror --}}
                        </div>
                    </div>
                    {{-- Component: tombolForm --}}
                    @include('components.tombolForm', ['linkKembali' => '/update-ki-km'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection