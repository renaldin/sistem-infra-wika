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
                    @if ($monitoring === false)
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    </div>
                    @endif
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
                            <th>Periode</th>
                            <th>Nama Proyek</th>
                            <th>Pendapat / Masukkan</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarCsi as $item)
                            @if ($item->id_user === $user->id_user || $user->role === 'Head Office' || $user->role === 'Admin')
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{date('F Y', strtotime($item->periode))}}</td>
                                    <td>{{$item->nama_proyek}}</td>
                                    <td>
                                        @if ($item->pendapat)
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pendapat{{$item->id_csi}}">Klik</button>
                                        @else
                                            Belum Ada
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a href="/detail-proyek-csi/{{$item->id_csi}}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Detail" data-original-title="Detail">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>                                    <circle cx="12" cy="12" r="5" stroke="currentColor"></circle>                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                    </mask>                                    <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5" fill="white"></circle>                                    </svg>                                
                                                </span>
                                            </a>
                                            @if ($user->role === 'Tim Proyek')
                                                <button type="button" class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_csi}}">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_csi}}" data-placement="top" title="Hapus" data-original-title="Hapus">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
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

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="/tambah-proyek-csi" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" data-style="py-0" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                @foreach($daftarProyek as $item)
                                    <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="periode">Periode</label>
                            <input type="MONTH" class="form-control" name="periode" id="periode" placeholder="Masukkan Periode" required>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($daftarCsi as $item)
<div class="modal fade" id="hapus{{$item->id_csi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-proyek-csi/{{$item->id_csi}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftarCsi as $item)
<div class="modal fade" id="pendapat{{$item->id_csi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendapat / Masukkan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{$item->pendapat}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftarCsi as $item)
<div class="modal fade" id="edit{{$item->id_csi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="/edit-proyek-csi/{{$item->id_csi}}" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" data-style="py-0" required>
                                <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                @foreach($daftarProyek as $row)
                                    <option value="{{$row->id_proyek}}">{{$row->nama_proyek}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="periode">Periode</label>
                            <input type="MONTH" class="form-control" name="periode" id="periode" value="{{$item->periode}}" placeholder="Masukkan Periode" required>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection