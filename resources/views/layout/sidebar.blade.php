<aside class="sidebar sidebar-default navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="#" class="navbar-brand">
            <h4 class="logo-title">
                <img src="{{ asset('templateLanding/img/infra2.png') }}" width="175" alt="Logo Jawer.id">
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
                        <a class="nav-link @if ($title === 'Data Tim Proyek') active @endif" data-bs-toggle="collapse" @if ($title === 'Data Tim Proyek') @endif href="#sidebar-tim-proyek" role="button" aria-expanded="false" aria-controls="sidebar-tim-proyek">
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
                        <a class="nav-link @if ($title === 'Data Proyek') active @endif" data-bs-toggle="collapse" @if ($title === 'Data Proyek') @endif href="#sidebar-proyek" role="button" aria-expanded="false" aria-controls="sidebar-proyek">
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
                                <a class="nav-link @if ($subTitle === 'Daftar Proyek' || $subTitle === 'Edit Proyek') active @endif" href="/daftar-proyek" @if ($subTitle === 'Daftar Proyek' || $subTitle === 'Edit Proyek') @endif>
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
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Operasi</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($subTitle === 'Daftar Monthly Report' || $subTitle === 'Edit Monthly Report' || $subTitle === 'Detail Monthly Report') active @endif" aria-current="page" @if ($subTitle === 'Daftar Monthly Report') @endif href="/daftar-monthly-report-admin">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Monthly Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($title === 'Master Activity') active @endif" aria-current="page" href="/pilih-bulan">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Master Activity</span>
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
                                    <span class="item-name">Permintaan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Update' || $subTitle === 'Form Update') active @endif" href="/update-technical-supporting">
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
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Informasi</span>
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
                        <a class="nav-link @if ($subTitle === 'Progress') active @endif" aria-current="page"  href="/progress-technical-supporting">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                            </i>
                            <span class="item-name">Progress TS</span>
                        </a>
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
                                    <span class="item-name">By Teamr</span>
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
                                <a class="nav-link @if ($subTitle === 'Monitoring' || $subTitle === 'Edit Technical Supporting') active @endif" href="/monitoring-technical-supporting">
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
                @elseif ($user->role === 'Head Office')
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
                                    <span class="item-name">Permintaan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($subTitle === 'Update' || $subTitle === 'Form Update') active @endif" href="/update-technical-supporting">
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
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Informasi</span>
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

