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
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    </div>
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
                    @endif --}}
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="ligth text-center">
                            <th rowspan="2">No</th>
                            <th rowspan="2">Uraian</th>
                            <th colspan="2">Global</th>
                            <th colspan="2">Engineering</th>
                            <th colspan="2">Office</th>
                        </tr>
                        <tr class="ligth text-center">
                            <th>Jumlah</th>
                            <th>%</th>
                            <th>Jumlah</th>
                            <th>%</th>
                            <th>Jumlah</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $global = $progress['fullEngineering'] + $progress['fullOffice'];
                            $nonGlobal = $progress['nonEngineering'] + $progress['trialEngineering'] + $progress['studentEngineering'] + $progress['nonOffice'] + $progress['trialOffice'] + $progress['studentOffice'];
                            $totalGlobal = $global + $nonGlobal;
                            $persenGlobal = $global != 0 ? number_format($global / $totalGlobal * 100, 1) : 0;
                            $persenNonGlobal = $nonGlobal != 0 ? number_format($nonGlobal / $totalGlobal * 100, 1) : 0;

                            $totalEngineer = $progress['nonEngineering'] + $progress['trialEngineering'] + $progress['studentEngineering'] + $progress['fullEngineering'];
                            $lainEngineer = $progress['nonEngineering'] + $progress['trialEngineering'] + $progress['studentEngineering'];
                            $persenFullEngineer = $progress['fullEngineering'] != 0 ? number_format($progress['fullEngineering'] / $totalEngineer * 100, 1) : 0;
                            $persenLainEngineer = $lainEngineer != 0 ? number_format($lainEngineer / $lainEngineer * 100, 1) : 0;

                            $lainOffice = $progress['nonOffice'] + $progress['trialOffice'] + $progress['studentOffice'];
                            $totalOffice = $lainOffice + $progress['fullOffice'];
                            $persenLainOffice = $lainOffice != 0 ? number_format($lainOffice / $totalOffice * 100, 1) : 0;
                            $persenFullOffice = $progress['fullOffice'] != 0 ? number_format($progress['fullOffice'] / $totalOffice * 100, 1) : 0;
                        @endphp

                        <tr>
                            <td class="text-center">1</td>
                            <td>Software berlisensi Full</td>
                            <td class="text-center">{{ $global }}</td>
                            <td class="text-center">{{$persenGlobal}}%</td>
                            <td class="text-center">{{$progress['fullEngineering']}}</td>
                            <td class="text-center">{{ $persenFullEngineer }}%</td>
                            <td class="text-center">{{$progress['fullOffice']}}</td>
                            <td class="text-center">{{ $persenFullOffice }}%</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Software dengan Lisensi lain-lain</td>
                            <td class="text-center">{{$nonGlobal}}</td>
                            <td class="text-center">{{$persenNonGlobal}}%</td>
                            <td class="text-center">{{$lainEngineer}}</td>
                            <td class="text-center">{{ $persenLainEngineer }}%</td>
                            <td class="text-center">{{$lainOffice}}</td>
                            <td class="text-center">{{ $persenLainOffice }}%</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td class="text-center">{{$totalGlobal}}</td>
                            <td class="text-center">{{($persenGlobal + $persenNonGlobal)}}%</td>
                            <td class="text-center">{{$totalEngineer}}</td>
                            <td class="text-center">{{ $persenFullEngineer + $persenLainEngineer }}%</td>
                            <td class="text-center">{{$totalOffice}}</td>
                            <td class="text-center">{{ $persenLainOffice + $persenFullOffice }}%</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection