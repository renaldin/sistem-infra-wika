@extends('layout.main')

@section('content')

@php
    $global = $chartLicense['fullEngineering'] + $chartLicense['fullOffice'];
    $nonGlobal = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalGlobal = $global + $nonGlobal;
    $persenGlobal = $global != 0 ? $global / $totalGlobal * 100 : 0;
    $persenNonGlobal = $nonGlobal != 0 ? $nonGlobal / $totalGlobal * 100 : 0;

    $totalEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['fullEngineering'];
    $lainEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'];
    $persenFullEngineer =$chartLicense['fullEngineering'] != 0 ? $chartLicense['fullEngineering'] / $totalEngineer * 100 : 0;
    $persenLainEngineer = $lainEngineer != 0 ? $lainEngineer / $lainEngineer * 100 : 0;

    $lainOffice = $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalOffice = $lainOffice + $chartLicense['fullOffice'];
    $persenLainOffice = $lainOffice != 0 ? $lainOffice / $totalOffice * 100 : 0;
    $persenFullOffice = $chartLicense['fullOffice'] != 0 ? $chartLicense['fullOffice'] / $totalOffice * 100 : 0;
@endphp

<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Proyek</p>
                           <h4 class="counter">{{$jumlahProyek}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Head Office</p>
                           <h4 class="counter">{{$jumlahHeadOffice}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Software</p>
                           <h4 class="counter">{{$jumlahSoftware}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">User</p>
                           <h4 class="counter">{{$jumlahUser}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-8">
      <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
              <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">MONITORING RKP PROYEK</h4>         
                  </div>
              </div>
              <div class="p-0 card-body">
                  <div class="mt-4 table-responsive">
                    <div style="max-height: 300px; overflow-y: auto;">
                      <table id="basic-table" class="table mb-0" role="grid">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Review RKP Tahap 1</th>
                                <th>Review RKP Tahap 2</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($daftarRkp as $item)
                              <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_proyek}}</td>
                                <td class="text-center">
                                  @if ($item->review1 === 1)
                                      <span class="btn-inner">
                                          <svg class="icon-25 text-primary" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                      </span>
                                  @else
                                      <span class="btn-inner">
                                          <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                      </span>
                                  @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->review2 === 1)
                                        <span class="btn-inner">
                                            <svg class="icon-25 text-primary" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                        </span>
                                    @else
                                        <span class="btn-inner">
                                            <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                        </span>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                    <DIV class="flex-wrap card-header d-flex justify-content-between mb-4">
                      <A href="/monitoring-lps" class="btn btn-sm btn-primary">LPS</A>
                      <A href="/monitoring-rkp" class="btn btn-sm btn-primary">RKP</A>
                    </DIV>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
              <div class="card-header">
                  <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">LISENSI SOFTWARE</h4>         
                  </div>
              </div>
              <div class="card-body">
                <div class="row p-3">
                  <div class="col-md-6">
                    <div class="text-center text-primary"><strong>Software Global</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-1" class="col-md-7 col-lg-7 myChart" val1="{{$global}}" val2="{{$nonGlobal}}"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="text-center text-primary"><strong>Software Engineering</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-2" class="col-md-7 col-lg-7 myChart" val1="{{$totalEngineer}}" val2="{{$lainEngineer}}"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="text-center text-primary"><strong>Software Office</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-3" class="col-md-7 col-lg-7 myChart" val1="{{$totalOffice}}" val2="{{$lainOffice}}"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <p class="text-primary mt-4">
                      <strong>Keterangan:</strong><br>
                      1. Software berlisensi Full <br>
                      2. Software dengan Lisensi Lain-lain
                    </p>
                  </div>
                  <div class="col-md-12">
                    <A href="/progress-license" class="btn btn-sm btn-primary float-right">Lisensi</A>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
              <div class="card" data-aos="fade-up" data-aos-delay="800">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                      <h4 class="card-title">$855.8K</h4>
                      <p class="mb-0">Gross Sales</p>          
                    </div>
                    <div class="d-flex align-items-center align-self-center">
                      <div class="d-flex align-items-center text-primary">
                          <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                          </svg>
                          <div class="ms-2">
                            <span class="text-gray">Sales</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center ms-3 text-info">
                          <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                          </svg>
                          <div class="ms-2">
                            <span class="text-gray">Cost</span>
                          </div>
                      </div>
                    </div>
                    <div class="dropdown">
                      <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="false">
                      This Week
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton22">
                          <li><a class="dropdown-item" href="#">This Week</a></li>
                          <li><a class="dropdown-item" href="#">This Month</a></li>
                          <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="d-main" class="d-main"></div>
                </div>
              </div>
          </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-4">
      <div class="row">
         <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>CUSTOMER SATISFACTION INDEX</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">{{$akumulasiCsi}}</h2>
                      Skala: 5.0
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                      <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                      </svg>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div>
         <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>PERSENTASE PENCAPAIAN PROGRAM SASAA</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">2.648</h2>
                      Skala: 
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                      <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                      </svg>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div>
         <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>KI/KM</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">2.648</h2>
                      Skala: 
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                      <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                      </svg>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div>
         <div class="col-md-12 col-lg-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Activity overview</h4>
                     <p class="mb-0">
                        <svg class ="me-2 icon-24" width="24" height="24" viewBox="0 0 24 24">
                           <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                        </svg>
                        16% this month
                     </p>
                  </div>
               </div>
               <div class="card-body">
                  <div class="mb-2  d-flex profile-media align-items-top">
                     <div class="mt-1 profile-dots-pills border-primary"></div>
                     <div class="ms-4">
                        <h6 class="mb-1 ">$2400, Purchase</h6>
                        <span class="mb-0">11 JUL 8:10 PM</span>
                     </div>
                  </div>
                  <div class="mb-2  d-flex profile-media align-items-top">
                     <div class="mt-1 profile-dots-pills border-primary"></div>
                     <div class="ms-4">
                        <h6 class="mb-1 ">New order #8744152</h6>
                        <span class="mb-0">11 JUL 11 PM</span>
                     </div>
                  </div>
                  <div class="mb-2  d-flex profile-media align-items-top">
                     <div class="mt-1 profile-dots-pills border-primary"></div>
                     <div class="ms-4">
                        <h6 class="mb-1 ">Affiliate Payout</h6>
                        <span class="mb-0">11 JUL 7:64 PM</span>
                     </div>
                  </div>
                  <div class="mb-2  d-flex profile-media align-items-top">
                     <div class="mt-1 profile-dots-pills border-primary"></div>
                     <div class="ms-4">
                        <h6 class="mb-1 ">New user added</h6>
                        <span class="mb-0">11 JUL 1:21 AM</span>
                     </div>
                  </div>
                  <div class="mb-1  d-flex profile-media align-items-top">
                     <div class="mt-1 profile-dots-pills border-primary"></div>
                     <div class="ms-4">
                        <h6 class="mb-1 ">Product added</h6>
                        <span class="mb-0">11 JUL 4:50 AM</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> 
</div>

<div class="row">
  <div class="col-lg-6">
     <div class="card">
        <div class="card-body">
           <div class="d-flex flex-column">
              <div class="mb-3">
                 <h2>Analytics</h2>
                 <span class="text-primary">Status</span>
              </div>
              <div class="border rounded ">
                 <div id="chart-one"></div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <div class="col-lg-6">
     <div class="card">
        <div class="card-header d-flex justify-content-between">
           <div class="header-title">
              <h4 class="card-title">Upcoming</h4>
           </div>
        </div>
        <div class="card-body">
           <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
              <div>
                 <h5>Psychology Exam</h5>
                 <p>carry out writing exam in school</p>
              </div>
              <div>
                 <span class="text-danger">19 jan</span>
                 <p>45 Minutes</p>
              </div>
              <button type="button" class="btn btn-outline-danger btn-sm">
                 <span class="btn-inner">
                    <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                 </span>
              </button>
           </div>
           <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
              <div>
                 <h5>Mathematics Toory</h5>
                 <p>carry out writing exam in school</p>
              </div>
              <div>
                 <span class="text-danger">20 Jan</span>
                 <p>35 Minutes</p>
              </div>
              <button type="button" class="btn btn-outline-danger btn-sm">
                 <span class="btn-inner">
                    <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                 </span>
              </button>
           </div>
           <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
              <div>
                 <h5>Literature Exam</h5>
                 <p>carry out writing exam in school</p>
              </div>
              <div>
                 <span class="text-danger">21 Jan</span>
                 <p>50 Minutes</p>
              </div>
              <button type="button" class="btn btn-outline-danger btn-sm">
                 <span class="btn-inner">
                    <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                 </span>
              </button>
           </div>
           <div class="d-flex justify-content-between align-items-center flex-wrap">
              <div>
                 <h5>Mathematics Exam</h5>
                 <p>carry out writing exam in school</p>
              </div>
              <div>
                 <span class="text-danger">22 jan</span>
                 <p>60 Minutes</p>
              </div>
              <button type="button" class="btn btn-outline-danger btn-sm">
                 <span class="btn-inner">
                    <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                 </span>
              </button>
           </div>
        </div>
     </div>
  </div>
</div>

@endsection

