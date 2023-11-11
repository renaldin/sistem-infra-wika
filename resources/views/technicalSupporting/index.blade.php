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
                            <th>Tanggal Submit</th>
                            <th>Kendala Teknis</th>
                            <th>Status</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarTechnicalSupporting as $item)
                            @if (in_array($item->id_tim_proyek, $idTimProyek))
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        <span class="badge bg-primary">{{$item->nama_proyek}}</span>
                                    </td>
                                    <td>{{$item->tanggal_submit}}</td>
                                    <td>{{$item->kendala}}</td>
                                    <td>
                                        @if ($item->is_respon === 0)
                                            Belum Direspon
                                        @else
                                            {{$item->status_support}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            @if ($item->is_respon === 0)
                                                Belum Direspon
                                            @else
                                                <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#monitoring{{$item->id_technical_supporting}}" data-placement="top" title="Monitoring" data-original-title="Monitoring">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>                                    <circle cx="12" cy="12" r="5" stroke="currentColor"></circle>                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    </mask>                                    <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5" fill="white"></circle>                                    </svg>                                
                                                    </span>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($daftarTechnicalSupporting as $item)
<div class="modal fade" id="monitoring{{$item->id_technical_supporting}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Technical Supporting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Nama Proyek</th>
                            <td>:</td>
                            <td>{{$item->nama_proyek}}</td>
                        </tr>
                        <tr>
                            <th>PIC</th>
                            <td>:</td>
                            <td>{{$item->pic}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Laporan</th>
                            <td>:</td>
                            <td>{{$item->nomor_laporan}}</td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td>:</td>
                            <td>{{$item->kode}}</td>
                        </tr>
                        <tr>
                            <th>Topik</th>
                            <td>:</td>
                            <td>{{$item->topik}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Submit</th>
                            <td>:</td>
                            <td>{{$item->tanggal_submit}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>:</td>
                            <td>{{$item->tanggal_selesai}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{$item->status_support}}</td>
                        </tr>
                        <tr>
                            <th>Dokumen</th>
                            <td>:</td>
                            <td><a href="{{$item->dokumen}}" target="_blank"></a></td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>:</td>
                            <td>{{$item->note}}</td>
                        </tr>
                        <tr>
                            <th>Kendala</th>
                            <td>:</td>
                            <td>{{$item->kendala}}</td>
                        </tr>
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