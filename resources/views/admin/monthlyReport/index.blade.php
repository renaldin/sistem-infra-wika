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
                <div class="row">
                    {{-- <div class="col-lg-12">
                        <a href="/export-all-monthly-report" class="btn btn-primary mb-4">Export Excel</a>
                    </div> --}}
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
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Tanggal</th>
                            <th>Tipe Konstruksi</th>
                            <th>Prioritas</th>
                            <th>Nama Tim Proyek</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarProyek as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama_proyek}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->tipe_konstruksi}}</td>
                            <td>{{$item->prioritas}}</td>
                            <td>
                                <span class="badge bg-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#tim-proyek{{$item->id_proyek}}">{{$item->nama_tim_proyek}}</span>
                            </td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Monthly Report" data-original-title="Edit" href="/detail-monthly-report/{{$item->id_proyek}}">
                                        <span class="btn-inner">
                                            Monthly Report
                                        </span>
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


@foreach ($daftarProyek as $item)
<div class="modal fade" id="tim-proyek{{$item->id_proyek}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tim Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Nama Tim Proyek</th>
                            <td>:</td>
                            <td>{{$item->nama_tim_proyek}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>:</td>
                            <td>{{$item->tanggal_dibuat}}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{$item->deskripsi}}</td>
                        </tr>
                    </table>
                    <br>
                    <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Jabatan</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($daftarDetailTimProyek as $row)
                                @if ($row->id_tim_proyek === $item->id_tim_proyek)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->nama_user}}</td>
                                        <td>{{$row->jabatan}}</td>
                                        <td>{{$row->telepon}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection