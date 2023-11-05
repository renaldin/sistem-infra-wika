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
                    <form action="@if($form === 'Tambah') /tambah-activity @elseif($form === 'Edit') /edit-activity/{{$detail->id_engineering_activity}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_user">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{$user->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nip">NIP</label>
                            <input type="text" class="form-control" value="{{$user->nip}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="jabatan">Present Positon</label>
                            <input type="text" class="form-control" value="{{$user->jabatan}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="fungsi">Fungsi</label>
                            <input type="text" class="form-control" value="{{$user->fungsi}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal_masuk_kerja">Tanggal Masuk Kerja</label>
                            <input type="hidden" name="id_user" value="{{$user->id_user}}">
                            <input type="date" class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror" id="tanggal_masuk_kerja" name="tanggal_masuk_kerja" value="@if($form === 'Tambah'){{ date('Y-m-d') }}@elseif($form === 'Edit'){{$detail->tanggal_masuk_kerja}}@endif" placeholder="Masukkan Tanggal Masuk Kerja" readonly>
                            @error('tanggal_masuk_kerja')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="status_kerja">Status Kerja</label>
                            <select name="status_kerja" id="status_kerja" class="selectpicker form-control @error('status_kerja') is-invalid @enderror" data-style="py-0" @if($form === 'Detail') disabled @endif required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="WFA" @if($form === "Tambah" && old("status_kerja") === "WFA") selected @elseif($form === "Edit" && $detail->status_kerja === "WFA") selected @endif)>WFA</option>
                                <option value="WFO" @if($form === "Tambah" && old("status_kerja") === "WFO") selected @elseif($form === "Edit" && $detail->status_kerja === "WFO") selected @endif>WFO</option>
                            </select>
                            @error('status_kerja')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="judul_pekerjaan">Judul / Deskripsi Pekerjaan</label>
                            <input type="text" class="form-control @error('judul_pekerjaan') is-invalid @enderror" id="judul_pekerjaan" name="judul_pekerjaan" value="@if($form === 'Tambah'){{ old('judul_pekerjaan') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->judul_pekerjaan}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor judul_pekerjaan">
                            @error('judul_pekerjaan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_kategori_pekerjaan">Kategori Pekerjaan</label>
                            <select name="id_kategori_pekerjaan" id="id_kategori_pekerjaan" class="selectpicker form-control @error('id_kategori_pekerjaan') is-invalid @enderror" data-style="py-0" required>
                                @if ($form === 'Edit')
                                    <option value="{{$detail->id_kategori_pekerjaan}}">{{$detail->kategori_pekerjaan}}</option>
                                @else
                                    <option value="" selected disabled>-- Pilih --</option>
                                @endif
                                @foreach ($daftarPekerjaan as $item)
                                    @if ($user->fungsi === $item->fungsi)
                                        <option value="{{$item->id_kategori_pekerjaan}}">{{$item->kategori_pekerjaan}}</option>
                                    @endif
                                @endforeach
                                {{-- @if($user->fungsi === 'Design & Analysis')
                                    <option value="CSI Collecting, Monitoring & Feedback Follow Up" @if($form === "Tambah" && old("kategori_pekerjaan") === "CSI Collecting, Monitoring & Feedback Follow Up") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "CSI Collecting, Monitoring & Feedback Follow Up") selected @endif)>CSI Collecting, Monitoring & Feedback Follow Up</option>
                                    <option value="Project Technical Supporting" @if($form === "Tambah" && old("kategori_pekerjaan") === "Project Technical Supporting") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Project Technical Supporting") selected @endif>Project Technical Supporting</option>
                                    <option value="Engineering Clinic" @if($form === "Tambah" && old("kategori_pekerjaan") === "Engineering Clinic") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Engineering Clinic") selected @endif>Engineering Clinic</option>
                                    <option value="Quality Engineering Committee (If Any)" @if($form === "Tambah" && old("kategori_pekerjaan") === "Quality Engineering Committee (If Any)") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Quality Engineering Committee (If Any)") selected @endif>Quality Engineering Committee (If Any)</option>
                                    <option value="Engineering Work Optimation dan Efficiency Collecting" @if($form === "Tambah" && old("kategori_pekerjaan") === "Engineering Work Optimation dan Efficiency Collecting") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Engineering Work Optimation dan Efficiency Collecting") selected @endif>Engineering Work Optimation dan Efficiency Collecting</option>
                                    <option value="Engineering Lesson Learn Register" @if($form === "Tambah" && old("kategori_pekerjaan") === "Engineering Lesson Learn Register") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Engineering Lesson Learn Register") selected @endif>Engineering Lesson Learn Register</option>
                                    <option value="Monitoring & Collecting KI/KM Div Infra 2" @if($form === "Tambah" && old("kategori_pekerjaan") === "Monitoring & Collecting KI/KM Div Infra 2") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Monitoring & Collecting KI/KM Div Infra 2") selected @endif>Monitoring & Collecting KI/KM Div Infra 2</option>
                                    <option value="Technical Code & Standard Control" @if($form === "Tambah" && old("kategori_pekerjaan") === "Technical Code & Standard Control") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Technical Code & Standard Control") selected @endif>Technical Code & Standard Control</option>
                                    <option value="Technical Software Renewing & Personel Capability" @if($form === "Tambah" && old("kategori_pekerjaan") === "Technical Software Renewing & Personel Capability") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Technical Software Renewing & Personel Capability") selected @endif>Technical Software Renewing & Personel Capability</option>
                                    <option value="Soil Investigation and Project Data Collecting" @if($form === "Tambah" && old("kategori_pekerjaan") === "Soil Investigation and Project Data Collecting") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Soil Investigation and Project Data Collecting") selected @endif>Soil Investigation and Project Data Collecting</option>
                                @elseif($user->fungsi === 'BIM & Digitalization Engineering')
                                    <option value="Strategic Programs Planning" @if($form === "Tambah" && old("kategori_pekerjaan") === "Strategic Programs Planning") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Strategic Programs Planning") selected @endif>Strategic Programs Planning</option>
                                    <option value="Management Review (MR) Content Planning" @if($form === "Tambah" && old("kategori_pekerjaan") === "Management Review (MR) Content Planning") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Management Review (MR) Content Planning") selected @endif>Management Review (MR) Content Planning</option>
                                    <option value="Monitoring Project Technical Issue, Production & BIM" @if($form === "Tambah" && old("kategori_pekerjaan") === "Monitoring Project Technical Issue, Production & BIM") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Monitoring Project Technical Issue, Production & BIM") selected @endif>Monitoring Project Technical Issue, Production & BIM</option>
                                    <option value="Personnel Time Frame Management" @if($form === "Tambah" && old("kategori_pekerjaan") === "Personnel Time Frame Management") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Personnel Time Frame Management") selected @endif>Personnel Time Frame Management</option>
                                    <option value="Submission & Monitoring Engineering Expertise Certification" @if($form === "Tambah" && old("kategori_pekerjaan") === "Submission & Monitoring Engineering Expertise Certification") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Submission & Monitoring Engineering Expertise Certification") selected @endif>Submission & Monitoring Engineering Expertise Certification</option>
                                    <option value="BIM Project Monitoring" @if($form === "Tambah" && old("kategori_pekerjaan") === "BIM Project Monitoring") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "BIM Project Monitoring") selected @endif>BIM Project Monitoring</option>
                                    <option value="BIM Project Supporting" @if($form === "Tambah" && old("kategori_pekerjaan") === "BIM Project Supporting") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "BIM Project Supporting") selected @endif>BIM Project Supporting</option>
                                    <option value="BIM & Engineering Learning Center" @if($form === "Tambah" && old("kategori_pekerjaan") === "BIM & Engineering Learning Center") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "BIM & Engineering Learning Center") selected @endif>BIM & Engineering Learning Center</option>
                                    <option value="BIM Software Controlling & Submission" @if($form === "Tambah" && old("kategori_pekerjaan") === "BIM Software Controlling & Submission") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "BIM Software Controlling & Submission") selected @endif>BIM Software Controlling & Submission</option>
                                    <option value="Data Dashboard Design System" @if($form === "Tambah" && old("kategori_pekerjaan") === "Data Dashboard Design System") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Data Dashboard Design System") selected @endif>Data Dashboard Design System</option>
                                    <option value="Data Center Controlling & Reviewing" @if($form === "Tambah" && old("kategori_pekerjaan") === "Data Center Controlling & Reviewing") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Data Center Controlling & Reviewing") selected @endif>Data Center Controlling & Reviewing</option>
                                    <option value="Project Technical Support Report Collecting & Uploading" @if($form === "Tambah" && old("kategori_pekerjaan") === "Project Technical Support Report Collecting & Uploading") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Project Technical Support Report Collecting & Uploading") selected @endif>Project Technical Support Report Collecting & Uploading</option>
                                @elseif($user->fungsi === 'System Engineering & Lean Construction')
                                    <option value="Sub-Contractor Technical Verification" @if($form === "Tambah" && old("kategori_pekerjaan") === "Sub-Contractor Technical Verification") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Sub-Contractor Technical Verification") selected @endif>Sub-Contractor Technical Verification</option>
                                    <option value="WIKA Procedure Reviewing Person" @if($form === "Tambah" && old("kategori_pekerjaan") === "WIKA Procedure Reviewing Person") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "WIKA Procedure Reviewing Person") selected @endif>WIKA Procedure Reviewing Person</option>
                                    <option value="Project Technical Risk Management" @if($form === "Tambah" && old("kategori_pekerjaan") === "Project Technical Risk Management") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Project Technical Risk Management") selected @endif>Project Technical Risk Management</option>
                                    <option value="WIKA Work Instruction Reviewing Person" @if($form === "Tambah" && old("kategori_pekerjaan") === "WIKA Work Instruction Reviewing Person") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "WIKA Work Instruction Reviewing Person") selected @endif>WIKA Work Instruction Reviewing Person</option>
                                    <option value="Project RKP Reviewing Person" @if($form === "Tambah" && old("kategori_pekerjaan") === "Project RKP Reviewing Person") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Project RKP Reviewing Person") selected @endif>Project RKP Reviewing Person</option>
                                    <option value="Project LPS Reviewing Person" @if($form === "Tambah" && old("kategori_pekerjaan") === "Project LPS Reviewing Person") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Project LPS Reviewing Person") selected @endif>Project LPS Reviewing Person</option>
                                    <option value="Pelatihan, Webinar, Internal Training Sub-Divisi Engineering" @if($form === "Tambah" && old("kategori_pekerjaan") === "Pelatihan, Webinar, Internal Training Sub-Divisi Engineering") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Pelatihan, Webinar, Internal Training Sub-Divisi Engineering") selected @endif>Pelatihan, Webinar, Internal Training Sub-Divisi Engineering</option>
                                    <option value="CMC Personnel Collecting" @if($form === "Tambah" && old("kategori_pekerjaan") === "CMC Personnel Collecting") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "CMC Personnel Collecting") selected @endif>CMC Personnel Collecting</option>
                                    <option value="Memorandum of Understanding (MOU) With Partner Team" @if($form === "Tambah" && old("kategori_pekerjaan") === "Memorandum of Understanding (MOU) With Partner Team") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Memorandum of Understanding (MOU) With Partner Team") selected @endif>Memorandum of Understanding (MOU) With Partner Team</option>
                                    <option value="Lean Construction" @if($form === "Tambah" && old("kategori_pekerjaan") === "Lean Construction") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Lean Construction") selected @endif>Lean Construction</option>
                                @else
                                    <option value="Lain-lain" @if($form === "Tambah" && old("kategori_pekerjaan") === "Lain-lain") selected @elseif($form === "Edit" && $detail->kategori_pekerjaan === "Lain-lain") selected @endif>Lain-lain</option>
                                @endif --}}
                            </select>
                            @error('kategori_pekerjaan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="durasi">Durasi Pekerjaan (Jam)</label>
                            <select name="durasi" id="durasi" class="selectpicker form-control @error('durasi') is-invalid @enderror" data-style="py-0" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="0.5" @if($form === "Tambah" && old("durasi") === "0.5") selected @elseif($form === "Edit" && $detail->durasi === "0.5") selected @endif)>0.5</option>
                                <option value="1" @if($form === "Tambah" && old("durasi") === "1") selected @elseif($form === "Edit" && $detail->durasi  === "1") selected @endif>1</option>
                                <option value="1.5" @if($form === "Tambah" && old("durasi") === "1.5") selected @elseif($form === "Edit" && $detail->durasi === "1.5") selected @endif>1.5</option>
                                <option value="2" @if($form === "Tambah" && old("durasi") === "2") selected @elseif($form === "Edit" && $detail->durasi === "2") selected @endif>2</option>
                                <option value="2.5" @if($form === "Tambah" && old("durasi") === "2.5") selected @elseif($form === "Edit" && $detail->durasi === "2.5") selected @endif>2.5</option>
                                <option value="3" @if($form === "Tambah" && old("durasi") === "3") selected @elseif($form === "Edit" && $detail->durasi === "3") selected @endif>3</option>
                                <option value="3.5" @if($form === "Tambah" && old("durasi") === "3.5") selected @elseif($form === "Edit" && $detail->durasi === "3.5") selected @endif>3.5</option>
                                <option value="4" @if($form === "Tambah" && old("durasi") === "4") selected @elseif($form === "Edit" && $detail->durasi === "4") selected @endif>4</option>
                                <option value="4.5" @if($form === "Tambah" && old("durasi") === "4.5") selected @elseif($form === "Edit" && $detail->durasi === "4.5") selected @endif>4.5</option>
                                <option value="5" @if($form === "Tambah" && old("durasi") === "5") selected @elseif($form === "Edit" && $detail->durasi === "5") selected @endif>5</option>
                                <option value="5.5" @if($form === "Tambah" && old("durasi") === "5.5") selected @elseif($form === "Edit" && $detail->durasi === "5.5") selected @endif>5.5</option>
                                <option value="6" @if($form === "Tambah" && old("durasi") === "6") selected @elseif($form === "Edit" && $detail->durasi === "6") selected @endif>6</option>
                                <option value="6.5" @if($form === "Tambah" && old("durasi") === "6.5") selected @elseif($form === "Edit" && $detail->durasi === "6.5") selected @endif>6.5</option>
                                <option value="7" @if($form === "Tambah" && old("durasi") === "7") selected @elseif($form === "Edit" && $detail->durasi === "7") selected @endif>7</option>
                                <option value="7.5" @if($form === "Tambah" && old("durasi") === "7.5") selected @elseif($form === "Edit" && $detail->durasi === "7.5") selected @endif>7.5</option>
                                <option value="8" @if($form === "Tambah" && old("durasi") === "8") selected @elseif($form === "Edit" && $detail->durasi === "8") selected @endif>8</option>
                            </select>
                            @error('durasi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="evidence">Evidence</label>
                            <input type="file" class="form-control @error('evidence') is-invalid @enderror" id="preview_image" name="evidence" @if($form === 'Detail') disabled @endif>
                            @error('evidence')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="evidence"></label>
                            <div class="profile-img-edit position-relative">
                                <img src="@if($form === 'Tambah') {{ asset('evidence/default1.jpg') }} @elseif($form === 'Edit' || $form === 'Detail') {{ asset('evidence/'.$detail->evidence) }} @endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                            </div>
                        </div>
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/check-activity'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection