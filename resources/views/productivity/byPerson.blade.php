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
                            <form action="/productivity-by-person" method="POST">
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                    <thead>
                                        <tr class="ligth">
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th style="min-width: 100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($activity as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nip}}</td>
                                            <td>{{$item->nama_user}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Productivity" data-original-title="Productivity" href="/productivity-by-person/{{$item->id_user}}/{{$detailBulan}}">
                                                        Productivity
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@endsection