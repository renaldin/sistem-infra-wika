@extends('layout.main')

@section('content')
<form action="@if($form === 'Edit') /edit-monthly-report-admin/{{$detail->id_monthly_report}} @endif" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Proyek</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="id_proyek">Nama Proyek</label>
                                <input type="hidden" name="id_proyek" value="{{$detail->id_proyek}}">
                                <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Implementasi Bim</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="tiga_d" id="tiga_d" @if($detail->tiga_d === 1) checked @endif>
                                    <label class="form-check-label" for="tiga_d">
                                        3D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="empat_d" id="empat_d" @if($detail->empat_d === 1) checked @endif>
                                    <label class="form-check-label" for="empat_d">
                                        4D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="lima_d" id="lima_d" @if($detail->lima_d === 1) checked @endif>
                                    <label class="form-check-label" for="lima_d">
                                        5D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="cde" id="cde" @if($detail->cde === 1) checked @endif>
                                    <label class="form-check-label" for="cde">
                                        CDE
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Report</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_report">Tanggal Report</label>
                                <input type="date" class="form-control @error('tanggal_report') is-invalid @enderror" id="tanggal_report" name="tanggal_report" value="@if($form === 'Tambah'){{ old('tanggal_report') }}@elseif($form === 'Edit'){{$detail->tanggal_report}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal Report">
                                @error('tanggal_report')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="realisasi_proyek">Realisasi Proyek (%)</label>
                                <input type="number" class="form-control @error('realisasi_proyek') is-invalid @enderror" id="realisasi_proyek" name="realisasi_proyek" value="@if($form === 'Tambah'){{ old('realisasi_proyek') }}@elseif($form === 'Edit'){{$detail->realisasi_proyek}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Realisasi Proyek">
                                @error('realisasi_proyek')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kendala_implementasi_bim">Kendala Implementasi Bim</label>
                                <input type="text" class="form-control @error('kendala_implementasi_bim') is-invalid @enderror" id="kendala_implementasi_bim" name="kendala_implementasi_bim" value="@if($form === 'Tambah'){{ old('kendala_implementasi_bim') }}@elseif($form === 'Edit'){{$detail->kendala_implementasi_bim}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Kendala Implementasi Bim">
                                @error('kendala_implementasi_bim')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="engineering_issue_berjalan">Engineering Issue Berjalan</label>
                                <input type="text" class="form-control @error('engineering_issue_berjalan') is-invalid @enderror" id="engineering_issue_berjalan" name="engineering_issue_berjalan" value="@if($form === 'Tambah'){{ old('engineering_issue_berjalan') }}@elseif($form === 'Edit'){{$detail->engineering_issue_berjalan}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Engineering Issue Berjalan">
                                @error('engineering_issue_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="masalah_produksi_berjalan">Masalah Produksi Berjalan</label>
                                <input type="text" class="form-control @error('masalah_produksi_berjalan') is-invalid @enderror" id="masalah_produksi_berjalan" name="masalah_produksi_berjalan" value="@if($form === 'Tambah'){{ old('masalah_produksi_berjalan') }}@elseif($form === 'Edit'){{$detail->masalah_produksi_berjalan}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Masalah Produksi Berjalan">
                                @error('masalah_produksi_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="konsep_lean_construction_berjalan">Konsep Lean Construction Berjalan</label>
                                <input type="text" class="form-control @error('konsep_lean_construction_berjalan') is-invalid @enderror" id="konsep_lean_construction_berjalan" name="konsep_lean_construction_berjalan" value="@if($form === 'Tambah'){{ old('konsep_lean_construction_berjalan') }}@elseif($form === 'Edit'){{$detail->konsep_lean_construction_berjalan}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Konsep Lean Construction Berjalan">
                                @error('konsep_lean_construction_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="feedback_untuk_perusahaan">Feedback Untuk Perusahaan</label>
                                <input type="text" class="form-control @error('feedback_untuk_perusahaan') is-invalid @enderror" id="feedback_untuk_perusahaan" name="feedback_untuk_perusahaan" value="@if($form === 'Tambah'){{ old('feedback_untuk_perusahaan') }}@elseif($form === 'Edit'){{$detail->feedback_untuk_perusahaan}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Feedback Untuk Perusahaan">
                                @error('feedback_untuk_perusahaan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="evidence_link">Evidence Link</label>
                                <input type="text" class="form-control @error('evidence_link') is-invalid @enderror" id="evidence_link" name="evidence_link" value="@if($form === 'Tambah'){{ old('evidence_link') }}@elseif($form === 'Edit'){{$detail->evidence_link}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Evidence Link">
                                @error('evidence_link')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/daftar-monthly-report" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection