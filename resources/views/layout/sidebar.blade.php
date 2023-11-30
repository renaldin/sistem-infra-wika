@php
    $jumlahKiKm = DB::table('ki_km')->where('is_respon', 0)->count();
    $jumlahTS = DB::table('technical_supporting')->where('is_respon', 0)->count();
   
    if ($user->role === 'Tim Proyek') {
        $detailTimPRoyek = DB::table('detail_tim_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'detail_tim_proyek.id_tim_proyek')
            ->join('user', 'user.id_user', '=', 'detail_tim_proyek.id_user')
            ->where('detail_tim_proyek.id_user', $user->id_user)
            ->get();
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->where('proyek.id_tim_proyek', $item->id_tim_proyek)
            ->first();
        }
        $jumlahRkp = 0;
        foreach ($dataProyekByUser as $item) {
           if ($item->status_rkp == 1) {
            $jumlahRkp += 1;
           }
        }
        $jumlahLps = 0;
        foreach ($dataProyekByUser as $item) {
           if ($item->status_lps == 1) {
            $jumlahLps += 1;
           }
        }
    }
@endphp
<aside class="sidebar sidebar-default navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="#" class="navbar-brand">
            <h4 class="logo-title">
                <img src="{{ asset('image/infra2black.png') }}" width="175" alt="Logo Jawer.id">
            </h4>
        </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true" style="background-color: #004899;">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
     
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list mb-5">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($subTitle === 'Dashboard') active @endif" aria-current="page"
                    @if ($subTitle === 'Dashboard') @endif href="/dashboard">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                @if ($user->role === 'Admin')
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Data Master</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Data User') active @endif" data-bs-toggle="collapse"
                        @if ($title === 'Data User') @endif href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">User</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah User') active @endif" @if ($subTitle === 'Tambah User') @endif href="/tambah-user">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Daftar User' || $subTitle === 'Edit User') active @endif" href="/daftar-user" @if ($subTitle === 'Daftar User' || $subTitle === 'Edit User') @endif>
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Daftar User</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Data Tim Proyek') active @endif" data-bs-toggle="collapse" href="#sidebar-tim-proyek" role="button" aria-expanded="false" aria-controls="sidebar-tim-proyek">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Tim Proyek</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-tim-proyek" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah Tim Proyek') active @endif" href="/tambah-tim-proyek">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah Tim Proyek</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Daftar Tim Proyek' || $subTitle === 'Edit Tim Proyek') active @endif" href="/daftar-tim-proyek" @if ($subTitle === 'Daftar Tim Proyek' || $subTitle === 'Edit Tim Proyek') @endif>
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Daftar Proyek</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Data Proyek') active @endif" data-bs-toggle="collapse" href="#sidebar-proyek" role="button" aria-expanded="false" aria-controls="sidebar-proyek">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Proyek</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-proyek" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah Proyek') active @endif" href="/tambah-proyek">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah Proyek</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Daftar Proyek' || $subTitle === 'Edit Proyek') active @endif" href="/daftar-proyek">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Daftar Proyek</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Dokumen LPS') active @endif" aria-current="page" href="/daftar-dokumen-lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Dokumen LPS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Data Software') active @endif" data-bs-toggle="collapse"href="#software" role="button" aria-expanded="false" aria-controls="software">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Software</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="software" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Data Software' && $subTitle === 'Tambah') active @endif" href="/tambah-software">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Data Software' && $subTitle === 'Daftar Software') active @endif @if($title === 'Data Software' && $subTitle === 'Edit') active @endif" href="/daftar-software">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Daftar</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Operasi</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Daftar Monthly Report' || $subTitle === 'Edit Monthly Report' || $subTitle === 'Detail Monthly Report') active @endif" aria-current="page" href="/daftar-monthly-report-admin">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monthly Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( $title === 'Master Activity') active @endif " aria-current="page" href="/pilih-bulan">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Master Activity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Review LPS' || $subTitle === 'Detail LPS') active @endif" aria-current="page" href="/input-lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Review LPS</span>
                        </a>
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Monitoring</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Daftar Activity') active @endif" aria-current="page"  href="/daftar-activity">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Daftar Activity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title === 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Technical Support</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Technical Supporting' && $subTitle === 'Update') active @endif" href="/update-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Daftar Update</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Technical Supporting' && $subTitle === 'Progress') active @endif" href="/progress-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Progress</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title === 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">KI/KM</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Kolaborasi KI/KM' && $subTitle === 'Update') active @endif" href="/update-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Daftar Update</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Kolaborasi KI/KM' && $subTitle === 'Progress') active @endif" href="/progress-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Progress</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Data Productivity') active @endif" data-bs-toggle="collapse"
                        @if ($title === 'Data Productivity') @endif href="#sidebar-productivity" role="button" aria-expanded="false" aria-controls="sidebar-productivity">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Productivity</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-productivity" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'By Team') active @endif" href="/productivity-by-team">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">By Team</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'By Person') active @endif" href="/productivity-by-person">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">By Person</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">RKP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'LPS') active @endif" data-bs-toggle="collapse" href="#lps" role="button" aria-expanded="false" aria-controls="lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">LPS</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="lps" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'LPS' && $subTitle === 'Monitoring LPS') active @endif" href="/monitoring-lps">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Monitoring</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'LPS' && $subTitle === 'Progress') active @endif" href="/progress-lps">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Progress</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'License Software') active @endif" data-bs-toggle="collapse" href="#license-software" role="button" aria-expanded="false" aria-controls="license-software">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">License Software</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="license-software" data-bs-parent="#sidebar-menu">
                            {{-- <li class="nav-item">
                                <a class="nav-link @if ($title === 'License Software' && $subTitle === 'Monitoring') active @endif" href="/monitoring-license-software">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Monitoring</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'License Software' && $subTitle === 'Progress') active @endif" href="/progress-license">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Progress</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Daftar Proyek CSI' || $subTitle === 'Daftar CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">CSI</span>
                        </a>
                    </li>
                @elseif ($user->role === 'Tim Proyek')
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Form</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Monthly Report') active @endif" data-bs-toggle="collapse" @if ($title === 'Monthly Report') @endif href="#monthly-report" role="button" aria-expanded="false" aria-controls="monthly-report">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Monthly Report</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="monthly-report" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah Monthly Report' || $subTitle === 'Pilih Proyek') active @endif" href="/pilih-proyek">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Daftar Monthly Report' || $subTitle === 'Edit Monthly Report' || $subTitle === 'Detail Monthly Report') active @endif" href="/daftar-monthly-report">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Daftar</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title === 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Technical Support</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah Technical Supporting') active @endif" href="/tambah-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Technical Supporting' && $subTitle === 'Monitoring' || $subTitle === 'Edit Technical Supporting') active @endif" href="/monitoring-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Monitoring</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title === 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">KI/KM</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Tambah KI/KM') active @endif" href="/tambah-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Kolaborasi KI/KM' && $subTitle === 'Monitoring') active @endif" href="/monitoring-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Monitoring</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'RKP') active @endif" data-bs-toggle="collapse" href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">RKP</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Update Dokumen') active @endif" href="/update-dokumen-rkp">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Update Dokumen<span class="badge rounded-pill bg-danger item-name">{{$jumlahRkp}}</span></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Monitoring RKP') active @endif" href="/monitoring-rkp">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Monitoring</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monitoring RKP</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'License Software') active @endif" aria-current="page" href="/daftar-license">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">License Software</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'CSI') active @endif" aria-current="page" href="/daftar-proyek-csi">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">CSI</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'LPS') active @endif" aria-current="page" href="/daftar-proyek-lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">LPS<span class="badge rounded-pill bg-danger item-name">{{$jumlahLps}}</span></span>
                        </a>
                    </li>
                @elseif ($user->role === 'Head Office')
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Data Master</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Rencana') active @endif" data-bs-toggle="collapse"  href="#rencana" role="button" aria-expanded="false" aria-controls="rencana">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Rencana</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="rencana" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'KI/KM') active @endif" href="/rencana-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">KI/KM</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Technical Supporting') active @endif" href="/rencana-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Technical Support</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Operasi</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Tambah Activity') active @endif" aria-current="page"  href="/tambah-activity">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Tambah Activity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Check Activity' || $subTitle === 'Edit Activity') active @endif" aria-current="page"  href="/check-activity">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Check Activity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title === 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">Technical Support<span class="badge rounded-pill bg-danger item-name">{{$jumlahTS}}</span></span>
                            {{-- <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i> --}}
                        </a>
                        <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Permintaan' || $subTitle === 'Form Permintaan') active @endif" href="/permintaan-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Permintaan<span class="badge rounded-pill bg-danger item-name">{{$jumlahTS}}</span></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Technical Supporting' && $subTitle === 'Update') active @elseif($title === 'Technical Supporting' &&  $subTitle === 'Form Update') active @endif" href="/update-technical-supporting">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Update</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title === 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">KI/KM<span class="badge rounded-pill bg-danger item-name">{{$jumlahKiKm}}</span></span>
                            {{-- <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i> --}}
                        </a>
                        <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Pengajuan' || $subTitle === 'Form Pengajuan') active @endif" href="/pengajuan-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Pengajuan<span class="badge rounded-pill bg-danger item-name">{{$jumlahKiKm}}</span></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'Kolaborasi KI/KM' && $subTitle === 'Update' || $subTitle === 'Form Update KI/KM') active @endif" href="/update-ki-km">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Update</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'RKP') active @endif" data-bs-toggle="collapse" @if ($title === 'RKP') @endif href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                            </i>
                            <span class="item-name">RKP</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'RKP' && $subTitle === 'Tambah') active @endif" href="/tambah-rkp">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Tambah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($title === 'RKP' && $subTitle === 'Update') active @elseif($title === 'RKP' && $subTitle === 'Form Update') active @endif" href="/update-rkp">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Update</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Review LPS' || $subTitle === 'Detail LPS') active @endif" aria-current="page" href="/input-lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Review LPS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'License Software') active @endif" aria-current="page" href="/daftar-license">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">License Software</span>
                        </a>
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Monitoring</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Daftar Activity') active @endif" aria-current="page"  href="/daftar-activity">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Daftar Activity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monitoring RKP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Monitoring LPS') active @endif" aria-current="page"  href="/monitoring-lps">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monitoring LPS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monitoring CSI</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <br><br>
                </li>
            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>

