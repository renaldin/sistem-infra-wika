@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pilih Bulan</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/productivity-by-team" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-xl-6 col-md-6">
                                        <label class="form-label" for="id_proyek">Bulan</label>
                                        <input type="month" class="form-control" name="bulan"  @if($bulan === false)value="{{date('Y-m')}}"@elseif($bulan === true) value="{{$detailBulan}}" @endif required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @if ($detailBulan)
                                <div class="mt-3">
                                    <label>Productivity by Team di bulan <strong>{{ date('F Y', strtotime($detailBulan)) }}</strong></label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($bulan === true)

    @if ($user->role === 'Admin')
    <div class="row">
        <div class="col-md-12">
            <a href="/export-by-team" class="btn btn-primary mb-4">Export Excel</a>
        </div>
    </div>
    @endif
    
    @php
        $totalSubtotal = 0;
        $totalWork = 0;
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
                                                    <th>Nama User</th>
                                                    <th>Jumlah Durasi Pekerjaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1; 
                                                    $subTotal = 0;   
                                                    $totalWorkHours = 0;
                                                    foreach($masterActivity as $row) {
                                                        if($row->fungsi === $item->fungsi) {
                                                            $totalWorkHours = $totalWorkHours + $row->work_hours;
                                                        }
                                                    }
                                                @endphp
                                                @foreach ($activity as $row)
                                                @if ($row->validasi == 1) 
                                                    @if ($row->fungsi === $item->fungsi)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$row->nama_user}}</td>
                                                        <td>{{$row->jumlah_durasi}}</td>
                                                    </tr>
                                                    @php
                                                        $subTotal = $subTotal + $row->jumlah_durasi;
                                                    @endphp
                                                   @endif
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @php
                                        if ($totalWorkHours == 0){
                                            $persen = 0;
                                        } else {
                                            $persen = round(($subTotal / $totalWorkHours) * 100, 1);
                                        }

                                        $totalSubtotal = $totalSubtotal + $subTotal;
                                        $totalWork = $totalWork + $totalWorkHours;
                                    @endphp
                                    <span>Sub Total: <strong>{{$subTotal}}</strong></span><br>
                                    <span>Hourly Working Requirement: <strong>{{$totalWorkHours}}</strong></span><br>
                                    <span>Achievement Rate Current Month: <strong>{{ $persen }}%</strong></span>
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
                        <label>Hourly Working Requirement (b) : <strong>{{ $totalWork }}</strong></label><br>
                        <label>Achievement Rate Current Month (a/b) : <strong>{{ round($totalWork == 0? 0 : ($totalSubtotal / $totalWork) * 100) }}%</strong></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- <div class="modal fade" id="export-by-team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/export-by-team" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="bulan">Bulan</label>
                                <input type="month" class="form-control" name="bulan" id="bulan" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Export</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endsection