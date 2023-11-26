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
                                <input type="number" min="1999" max="{{date('Y')}}" class="form-control" name="tahun"  @if($tahun === false)value="{{date('Y')}}"@else value="{{$tahun}}" @endif required>
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
                                <td>{{$detailRencana->januari}}</td>
                                <td>{{$realisasiJan}}</td>
                                <td>{{$detailRencana->januari == 0 ? 0 : round($realisasiJan / $detailRencana->januari * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Februari</td>
                                <td>{{$detailRencana->februari}}</td>
                                <td>{{$realisasiFeb}}</td>
                                <td>{{$detailRencana->februari == 0 ? 0 : round($realisasiFeb / $detailRencana->februari * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Maret</td>
                                <td>{{$detailRencana->maret}}</td>
                                <td>{{$realisasiMar}}</td>
                                <td>{{$detailRencana->maret == 0 ? 0 : round($realisasiMar / $detailRencana->maret * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>April</td>
                                <td>{{$detailRencana->april}}</td>
                                <td>{{$realisasiApr}}</td>
                                <td>{{$detailRencana->april == 0 ? 0 : round($realisasiApr / $detailRencana->april * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Mei</td>
                                <td>{{$detailRencana->mei}}</td>
                                <td>{{$realisasiMei}}</td>
                                <td>{{$detailRencana->mei == 0 ? 0 : round($realisasiMei / $detailRencana->mei * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Juni</td>
                                <td>{{$detailRencana->juni}}</td>
                                <td>{{$realisasiJun}}</td>
                                <td>{{$detailRencana->juni == 0 ? 0 : round($realisasiJun / $detailRencana->juni * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Juli</td>
                                <td>{{$detailRencana->juli}}</td>
                                <td>{{$realisasiJul}}</td>
                                <td>{{$detailRencana->juli == 0 ? 0 : round($realisasiJul / $detailRencana->juli * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Agustus</td>
                                <td>{{$detailRencana->agustus}}</td>
                                <td>{{$realisasiAgu}}</td>
                                <td>{{$detailRencana->agustus == 0 ? 0 : round($realisasiAgu / $detailRencana->agustus * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>September</td>
                                <td>{{$detailRencana->september}}</td>
                                <td>{{$realisasiSep}}</td>
                                <td>{{$detailRencana->september == 0 ? 0 : round($realisasiSep / $detailRencana->september * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Oktober</td>
                                <td>{{$detailRencana->oktober}}</td>
                                <td>{{$realisasiOkt}}</td>
                                <td>{{$detailRencana->oktober == 0 ? 0 : round($realisasiOkt / $detailRencana->oktober * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td>{{$detailRencana->november}}</td>
                                <td>{{$realisasiNov}}</td>
                                <td>{{$detailRencana->november == 0 ? 0 : round($realisasiNov / $detailRencana->november * 100, 1)}}%</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Desember</td>
                                <td>{{$detailRencana->desember}}</td>
                                <td>{{$realisasiDes}}</td>
                                <td>{{$detailRencana->desember == 0 ? 0 : round($realisasiDes / $detailRencana->desember * 100, 1)}}%</td>
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