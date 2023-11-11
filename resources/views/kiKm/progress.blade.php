@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pilih Tahun</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="/progress-ki-km" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-xl-3 col-md-6">
                                <label class="form-label" for="tahun">Tahun</label>
                                <input type="number" min="1999" max="{{date('Y')}}" class="form-control" name="tahun"  @if($tahun === false)value="{{date('Y')}}"@elseif($tahun === true) value="{{$tahun}}" @endif required>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Pilih</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($tahun !== false)
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">{{$subTitle}}</h4>
                    </div>
                </div>
                <div class="card-body" style="margin-bottom: -50px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary mb-2">{{$tahun}}</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $realisasiJan = $detailProgress['januari']->realisasi;
                                $realisasiFeb = $realisasiJan + $detailProgress['februari']->realisasi;
                                $realisasiMar = $realisasiFeb + $detailProgress['maret']->realisasi;
                                $realisasiApr = $realisasiMar + $detailProgress['april']->realisasi;
                                $realisasiMei = $realisasiApr + $detailProgress['mei']->realisasi;
                                $realisasiJun = $realisasiMei + $detailProgress['juni']->realisasi;
                                $realisasiJul = $realisasiJun + $detailProgress['juli']->realisasi;
                                $realisasiAgu = $realisasiJul + $detailProgress['agustus']->realisasi;
                                $realisasiSep = $realisasiAgu + $detailProgress['september']->realisasi;
                                $realisasiOkt = $realisasiSep + $detailProgress['oktober']->realisasi;
                                $realisasiNov = $realisasiOkt + $detailProgress['november']->realisasi;
                                $realisasiDes = $realisasiNov + $detailProgress['desember']->realisasi;
                            @endphp
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td>{{$detailProgress['januari']->rencana}}</td>
                                <td>{{$realisasiJan}}</td>
                                <td>{{$detailProgress['januari']->rencana == 0 ? 0 : round($realisasiJan / $detailProgress['januari']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Februari</td>
                                <td>{{$detailProgress['februari']->rencana}}</td>
                                <td>{{$realisasiFeb}}</td>
                                <td>{{$detailProgress['februari']->rencana == 0 ? 0 : round($realisasiFeb / $detailProgress['februari']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Maret</td>
                                <td>{{$detailProgress['maret']->rencana}}</td>
                                <td>{{$realisasiMar}}</td>
                                <td>{{$detailProgress['maret']->rencana == 0 ? 0 : round($realisasiMar / $detailProgress['maret']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>April</td>
                                <td>{{$detailProgress['april']->rencana}}</td>
                                <td>{{$realisasiApr}}</td>
                                <td>{{$detailProgress['april']->rencana == 0 ? 0 : round($realisasiApr / $detailProgress['april']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Mei</td>
                                <td>{{$detailProgress['mei']->rencana}}</td>
                                <td>{{$realisasiMei}}</td>
                                <td>{{$detailProgress['mei']->rencana == 0 ? 0 : round($realisasiMei / $detailProgress['mei']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Juni</td>
                                <td>{{$detailProgress['juni']->rencana}}</td>
                                <td>{{$realisasiJun}}</td>
                                <td>{{$detailProgress['juni']->rencana == 0 ? 0 : round($realisasiJun / $detailProgress['juni']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Juli</td>
                                <td>{{$detailProgress['juli']->rencana}}</td>
                                <td>{{$realisasiJul}}</td>
                                <td>{{$detailProgress['juli']->rencana == 0 ? 0 : round($realisasiJul / $detailProgress['juli']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Agustus</td>
                                <td>{{$detailProgress['agustus']->rencana}}</td>
                                <td>{{$realisasiAgu}}</td>
                                <td>{{$detailProgress['agustus']->rencana == 0 ? 0 : round($realisasiAgu / $detailProgress['agustus']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>September</td>
                                <td>{{$detailProgress['september']->rencana}}</td>
                                <td>{{$realisasiSep}}</td>
                                <td>{{$detailProgress['september']->rencana == 0 ? 0 : round($realisasiSep / $detailProgress['september']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Oktober</td>
                                <td>{{$detailProgress['oktober']->rencana}}</td>
                                <td>{{$realisasiOkt}}</td>
                                <td>{{$detailProgress['oktober']->rencana == 0 ? 0 : round($realisasiOkt / $detailProgress['oktober']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td>{{$detailProgress['november']->rencana}}</td>
                                <td>{{$realisasiNov}}</td>
                                <td>{{$detailProgress['november']->rencana == 0 ? 0 : round($realisasiNov / $detailProgress['november']->rencana, 1)}}</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Desember</td>
                                <td>{{$detailProgress['desember']->rencana}}</td>
                                <td>{{$realisasiDes}}</td>
                                <td>{{$detailProgress['desember']->rencana == 0 ? 0 : round($realisasiDes / $detailProgress['desember']->rencana, 1)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@endsection