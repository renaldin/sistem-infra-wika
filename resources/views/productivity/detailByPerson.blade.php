@extends('layout.main')

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data Head Office</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">NIP</label>
                            <input type="text" class="form-control" value="{{$detailUser->nip}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama</label>
                            <input type="text" class="form-control" value="{{$detailUser->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Jabatan</label>
                            <input type="text" class="form-control" value="{{$detailUser->jabatan}}" readonly>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $totalSubtotal = 0;
@endphp
@foreach ($daftarKategoriPekerjaan as $item)
    @if ($item->fungsi !== null)
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{$item->fungsi}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="user-list-table" class="table" role="grid">
                                        <thead>
                                            <tr class="ligth">
                                                <th>No</th>
                                                <th>Kategori Pekerjaan</th>
                                                <th>Jumlah Durasi Pekerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; 
                                                $subTotal = 0;
                                            @endphp
                                            @foreach ($activity as $row)
                                                @if ($row->fungsi === $item->fungsi)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$row->kategori_pekerjaan}}</td>
                                                        <td>{{$row->jumlah_durasi}}</td>
                                                    </tr>
                                                    @php
                                                        $subTotal = $subTotal + $row->jumlah_durasi;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @php
                                    $totalSubtotal = $totalSubtotal + $subTotal;
                                @endphp
                                <span>Sub Total: <strong>{{$subTotal}}</strong></span><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title mb-2">
                    <label>Hourly Work Productive Job Item (a) : <strong>{{ $totalSubtotal }}</strong></label><br>
                    <label>85% Hourly Working Requirement (b) : <strong>{{ $masterActivity->work_hours }}</strong></label><br>
                    <label>Achievement Rate Current Month (a/b) : <strong>{{ $masterActivity->work_hours == 0 ? 0 : round(($totalSubtotal / $masterActivity->work_hours) * 100) }}%</strong></label>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection