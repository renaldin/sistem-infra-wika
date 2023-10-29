@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form === 'Tambah') /tambah-tim-proyek @elseif($form === 'Edit') /edit-tim-proyek/{{$detail->id_tim_proyek}} @endif" method="POST">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_tim_proyek">Nama Tim Proyek</label>
                                <input type="text" class="form-control @error('nama_tim_proyek') is-invalid @enderror" id="nama_tim_proyek" name="nama_tim_proyek" value="@if($form === 'Tambah'){{ old('nama_tim_proyek') }}@elseif($form === 'Edit'){{$detail->nama_tim_proyek}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Tim Proyek ">
                                @error('nama_tim_proyek')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_dibuat">Tanggal Dibuat</label>
                                <input type="date" class="form-control @error('tanggal_dibuat') is-invalid @enderror" id="tanggal_dibuat" name="tanggal_dibuat" value="@if($form === 'Tambah'){{ old('tanggal_dibuat') }}@elseif($form === 'Edit'){{$detail->tanggal_dibuat}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal Dibuat">
                                @error('tanggal_dibuat')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="@if($form === 'Tambah'){{ old('deskripsi') }}@elseif($form === 'Edit'){{$detail->deskripsi}}@endif"  @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal Dibuat">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/daftar-proyek" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($form === 'Edit')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Kelola Anggota Tim</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
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
                        <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Jabatan</th>
                                    <th>No HP</th>
                                    <th style="min-width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($daftarDetailTimProyek as $item)
                                    @if($item->id_tim_proyek == $detail->id_tim_proyek)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_user}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td>{{$item->telepon}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_detail_tim_proyek}}" data-placement="top" title="Hapus Anggota" data-original-title="Delete">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/tambah-detail-tim-proyek" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="id_user">Nama Anggota</label>
                                <input type="hidden" name="id_tim_proyek" value="{{ $detail->id_tim_proyek }}" required>
                                <select name="id_user" id="id_user" class="selectpicker form-control @error('id_user') is-invalid @enderror" data-style="py-0" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach ($daftarUser as $item)
                                        @if ($item->role === 'Tim Proyek')
                                            <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_user')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
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

    @foreach ($daftarDetailTimProyek as $item)
        <div class="modal fade" id="hapus{{$item->id_detail_tim_proyek}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin akan hapus anggota bernama <strong>{{$item->nama_user}}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <a href="/hapus-detail-tim-proyek/{{$item->id_detail_tim_proyek}}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection