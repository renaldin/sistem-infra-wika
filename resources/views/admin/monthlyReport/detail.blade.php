@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Proyek</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Implementasi Bim</label>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="tiga_d" id="tiga_d" @if($detail->tiga_d === 1) checked @endif disabled>
                                <label class="form-check-label" for="tiga_d">
                                    3D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="empat_d" id="empat_d" @if($detail->empat_d === 1) checked @endif disabled>
                                <label class="form-check-label" for="empat_d">
                                    4D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="kesiapan_bim5d" id="kesiapan_bim5d" @if($detail->kesiapan_bim5d === 1) checked @endif disabled>
                                <label class="form-check-label" for="kesiapan_bim5d">
                                    Kesiapan Bim 5d
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="lima_d" id="lima_d" @if($detail->lima_d === 1) checked @endif disabled>
                                <label class="form-check-label" for="lima_d">
                                    5D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="cde" id="cde" @if($detail->cde === 1) checked @endif disabled>
                                <label class="form-check-label" for="cde">
                                    CDE
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tanggal MUlai</label>
                            <input type="text" class="form-control" value="{{$detail->tanggal}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tipe Konstruksi</label>
                            <input type="text" class="form-control" value="{{$detail->tipe_konstruksi}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Prioritas</label>
                            <input type="text" class="form-control" value="{{$detail->prioritas}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Status</label>
                            <input type="text" class="form-control" value="{{$detail->status}}" readonly>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">{{$title}}</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
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
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Tanggal Report</th>
                            <th>Realisasi Proyek</th>
                            <th>Evidence</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarMonthlyReport as $item)
                            @if ($item->id_proyek == $detail->id_proyek)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_proyek}}</td>
                                    <td>{{$item->tanggal_report}}</td>
                                    <td>{{$item->realisasi_proyek}}%</td>
                                    <td>{{$item->evidence_link}}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_monthly_report}}" data-placement="top" title="Detail Proyek" data-original-title="Detail">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>                                    <circle cx="12" cy="12" r="5" stroke="currentColor"></circle>                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    </mask>                                    <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5" fill="white"></circle>                                    </svg>                                
                                                </span>
                                            </button>
                                            <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Edit User" data-original-title="Edit" href="/edit-monthly-report/{{$item->id_monthly_report}}">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_monthly_report}}" data-placement="top" title="Hapus User" data-original-title="Delete">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
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

@foreach ($daftarMonthlyReport as $item)
<div class="modal fade" id="hapus{{$item->id_monthly_report}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Monthly Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus data monthly report ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-monthly-report/{{$item->id_monthly_report}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftarMonthlyReport as $item)
<div class="modal fade" id="detail{{$item->id_monthly_report}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Monthly Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="media-support-body">
                        <h6 class="mb-0">Nama Proyek :</h6>
                        <p>{{$item->nama_proyek}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Tanggal Report :</h6>
                        <p>{{$item->tanggal_report}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Realisasi Proyek :</h6>
                        <p>{{$item->realisasi_proyek}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Kendala Implementasi Bim :</h6>
                        <p>{{$item->kendala_implementasi_bim}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Engineering Issue Berjalan :</h6>
                        <p>{{$item->engineering_issue_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Masalah Produksi Berjalan :</h6>
                        <p>{{$item->masalah_produksi_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Konsep Lean Construction Berjalan :</h6>
                        <p>{{$item->konsep_lean_construction_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Feedback Untuk Perusahaan :</h6>
                        <p>{{$item->feedback_untuk_perusahaan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Evidence :</h6>
                        <p>{{$item->evidence_link}}</p>
                    </div>
                    @if($item->remarks !== null)
                    <div class="media-support-body">
                        <h6 class="mb-0">Remarks :</h6>
                        <p>{{$item->remarks}}</p>
                    </div>
                    @endif
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