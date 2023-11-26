@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Rencana {{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (session('success'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('fail') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <form action="/edit-rencana-detail/{{$detail->id_rencana}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Januari</label>
                            <input type="number" class="form-control" name="januari" value="{{$detail->januari}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Februari</label>
                            <input type="number" class="form-control" name="februari" value="{{$detail->februari}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Maret</label>
                            <input type="number" class="form-control" name="maret" value="{{$detail->maret}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">April</label>
                            <input type="number" class="form-control" name="april" value="{{$detail->april}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mei</label>
                            <input type="number" class="form-control" name="mei" value="{{$detail->mei}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Juni</label>
                            <input type="number" class="form-control" name="juni" value="{{$detail->juni}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Juli</label>
                            <input type="number" class="form-control" name="juli" value="{{$detail->juli}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Agustus</label>
                            <input type="number" class="form-control" name="agustus" value="{{$detail->agustus}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">September</label>
                            <input type="number" class="form-control" name="september" value="{{$detail->september}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Oktober</label>
                            <input type="number" class="form-control" name="oktober" value="{{$detail->oktober}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">November</label>
                            <input type="number" class="form-control" name="november" value="{{$detail->november}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Desember</label>
                            <input type="number" class="form-control" name="desember" value="{{$detail->desember}}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                            <button type="reset" class="btn btn-danger mb-1">Reset</button>
                            <a @if($tipe === 'KI/KM') href="/rencana-ki-km" @else href="/rencana-technical-supporting" @endif class="btn btn-secondary mb-1">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection