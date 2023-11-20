@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
            
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Kategori Proyek</th>
                            <th>Tanggal PHO</th>
                            <th class="text-wrap text-center">Data Utama PDF</th>
                            <th class="text-wrap text-center">Data Utama NATIVE</th>
                            <th class="text-wrap text-center">Data Pendukung PDF</th>
                            <th class="text-wrap text-center">Data Pendukung NATIVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarProgress as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td class="text-wrap">{{$item->nama_proyek}}</td>
                                <td>{{$item->kategori_proyek}}</td>
                                <td>{{$item->tanggal_pho_lps}}</td>
                                <td class="text-center">{{round((int)$item->pdf_utama / $jumlahDokumen['utama'] * 100, 2)}}%</td>
                                <td class="text-center">{{round((int)$item->native_utama / $jumlahDokumen['utama'] * 100, 2)}}%</td>
                                <td class="text-center">{{round((int)$item->pdf_pendukung / $jumlahDokumen['pendukung'] * 100, 2)}}%</td>
                                <td class="text-center">{{round((int)$item->native_pendukung / $jumlahDokumen['pendukung'] * 100, 2)}}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection