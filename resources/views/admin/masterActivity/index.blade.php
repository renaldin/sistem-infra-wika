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
                    <form action="/pilih-bulan" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-xl-3 col-md-6">
                                <label class="form-label" for="id_proyek">Bulan</label>
                                <input type="month" class="form-control" name="bulan"  @if($bulan === false)value="{{date('Y-m')}}"@elseif($bulan === true) value="{{$detailBulan}}" @endif required>
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

@if($bulan === true)
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
                        @if($daftar->isEmpty())
                            <div class="col-lg-12">
                                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                            </div>
                        @else
                            <div class="col-lg-12">
                                <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus">Hapus</button>
                            </div>
                        @endif
                        @if ($bulan === true && $pesanSuccess !== null)
                            <div class="col-lg-12">
                                <div class="alert bg-primary text-white alert-dismissible">
                                    <span>
                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                        {{ $pesanSuccess }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($bulan === true && $pesanError !== null)
                            <div class="col-lg-12">
                                <div class="alert bg-danger text-white alert-dismissible">
                                    <span>
                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                        {{ $pesanError }}
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
                                <th>Nama Lengkap</th>
                                <th>NIP</th>
                                <th>Absense Start</th>
                                <th>Absense End</th>
                                <th>Work Days</th>
                                <th>Work Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($daftar as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_user}}</td>
                                    <td>{{$item->nip}}</td>
                                    <td>{{$item->absense_start}}</td>
                                    <td>{{$item->absense_end}}</td>
                                    <td>{{$item->work_days}}</td>
                                    <td>{{$item->work_hours}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/tambah-master-activity" method="POST">
                        @csrf
                        <div class="row">
                            @php
                                $month = date('m', strtotime($detailBulan));
                                $year = date('Y', strtotime($detailBulan));
                                $min = $year . '-' . $month . '-01';
                                $max = date('Y-m-d', strtotime($min . ' +1 month'));
                            @endphp
                            <div class="form-group col-md-12">
                                <label class="form-label" for="absense_end">Absense End</label>
                                <input type="hidden" class="form-control" name="detail_bulan" value="{{$detailBulan}}" required>
                                <input type="date" class="form-control" min="{{$min}}" max="{{$max}}" id="absense_end" name="absense_end" placeholder="Masukkan Absense End" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/hapus-master-activity" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="absense_end">Apakah Anda yakin akan hapus data master activity bulan {{ date('F Y', strtotime($detailBulan)) }}?</label>
                                <input type="hidden" class="form-control" name="detail_bulan" value="{{$detailBulan}}" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-danger">Hapus</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif


@endsection