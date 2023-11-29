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
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Customer Satisfaction Index</p>
                           <h4 class="counter">{{$akumulasiCsi}}</h4> <small>Skala: 5.00</small>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Persentase Pencapaian Program SASAA</p>
                           <h4 class="counter">{{$akumulasiTechnicalSupport}}%</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">KI/KM</p>
                           <h4 class="counter">{{$akumulasiKiKm}}%</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Proyek</p>
                           <h4 class="counter">{{$jumlahProyek}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               {{-- <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Dokumen LPS</p>
                           <h4 class="counter">{{$jumlahDokumenLps}}</h4>
                        </div>
                     </div>
                  </div>
               </li> --}}
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-05" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg> --}}
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
            <div class="card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Update Progress Proyek</h4>
                     <p class="mb-0">
                        <svg class ="me-2 icon-24" width="24" height="24" viewBox="0 0 24 24">
                           <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                        </svg>
                        {{-- 16% this month --}}
                     </p>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div id="pie-chart-progress-proyek" persen_0_30="{{$persen_0_30}}" persen_30_50="{{$persen_30_50}}" persen_50_70="{{$persen_50_70}}" persen_70_100="{{$persen_70_100}}"></div>
                     </div>
                     <div class="col-md-12">
                        <div class="table-responsive">
                           <table class="table mt-3">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Proyek</th>
                                    <th>Progress</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php
                                    $no = 1;
                                 @endphp
                                 @foreach ($daftarProyek as $item)
                                    <tr style="max-width: 10px; overflow-y: auto;">
                                       <td>{{$no++}}</td>
                                       <td style="width: 10px;">{{$item->nama_proyek}}</td>
                                       <td>{{number_format($item->realisasi, 2)}}%</td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
               <div class="card-header">
                   <div class="header-title">
                     <h4 class="mb-2 card-title text-primary">MONITORING KELENGKAPAN DATA ENGINEERING UNTUK LPS</h4>         
                   </div>
               </div>
               <div class="card-body">
                 <div class="row p-2">
                   <div class="col-md-12 mb-2">
                      <div class="text-primary">
                         <strong>Keterangan:</strong><br>
                         1. Jika datanya banyak, Anda bisa scroll ke samping <br>
                         2. Arahkan cursor ke setiap chart bar untuk melihat datanya <br>
                         3. <div style="display: inline-block; background-color: #004899; width: 20px; height: 20px;"></div> File PDF <br>
                         4. <div style="display: inline-block; background-color: #0a72e9; width: 20px; height: 20px;"></div> File Native
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="text-center text-primary"><strong>Dokumen Utama</strong></div>
                     <div class="border rounded">
                      <div style="overflow-x: auto; overflow-y: hidden; height: 100%;">
                         <div id="bar-chart-new-1" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['utama']}}" ></div>
                      </div>
                     </div>
                   </div>
                   <div class="col-md-12 mt-3">
                     <div class="text-center text-primary"><strong>Dokumen Pendukung</strong></div>
                     <div class="border rounded">
                      <div style="overflow-x: auto; overflow-y: hidden; height: 100%;">
                         <div id="bar-chart-new-2" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['pendukung']}}"></div>
                      </div>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <A href="/progress-lps" class="btn btn-sm btn-primary float-right mt-3">LPS</A>
                   </div>
                 </div>
               </div>
            </div>
          </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-4">
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
              <div class="card-header">
                  <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">LISENSI SOFTWARE</h4>         
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                     <p class="text-primary">
                       <strong>Keterangan:</strong><br>
                       1. Software berlisensi Full <br>
                       2. Software dengan Lisensi Lain-lain
                     </p>
                   </div>
                  <div class="col-md-12">
                    <div class="text-center text-primary"><strong>Software Global</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-1" class="col-md-7 col-lg-7 myChart" val1="{{$global}}" val2="{{$nonGlobal}}"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="text-center text-primary"><strong>Software Engineering</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-2" class="col-md-7 col-lg-7 myChart" val1="{{$totalEngineer}}" val2="{{$lainEngineer}}"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="text-center text-primary"><strong>Software Office</strong></div>
                    <div class="flex-wrap d-flex align-items-center justify-content-center">
                      <div id="pie-chart-software-3" class="col-md-7 col-lg-7 myChart" val1="{{$totalOffice}}" val2="{{$lainOffice}}"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <A href="/progress-license" class="btn btn-sm btn-primary float-right">Lisensi</A>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- CSI SEBELUMNYA --}}
         {{-- <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>CUSTOMER SATISFACTION INDEX</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">{{$akumulasiCsi}}</h2>
                      Skala: 5.0
                  </div>
                  <a href="/monitoring-csi">
                     <div class="border  bg-soft-primary rounded p-3">
                         <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                         </svg>
                     </div>
                  </a>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div> --}}

         {{-- SAAS SEBELUMNYA --}}
         {{-- <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>PERSENTASE PENCAPAIAN PROGRAM SASAA</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">{{$akumulasiTechnicalSupport}}%</h2>
                  </div>
                  <a href="/progress-technical-supporting">
                     <div class="border  bg-soft-primary rounded p-3">
                         <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                         </svg>
                     </div>
                  </a>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div> --}}
         {{-- <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="text-center text-primary"><strong>KI/KM</strong></div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                      <h2 class="counter">{{$akumulasiKiKm}}%</h2>
                  </div>
                  <a href="/progress-ki-km">
                     <div class="border  bg-soft-primary rounded p-3">
                      <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                      </svg>
                     </div>
                  </a>
                </div>
                <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                      <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
         </div> --}}
         
         <div class="col-md-12 col-lg-12">
            <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
               <div class="pb-4 border-0 card-header">
                  <div class="p-4 border border-white rounded primary-gradient-card">
                     <div class="my-4">
                     </div>
                     <div class="mb-2 d-flex align-items-center justify-content-between">
                     </div>
                     <div class="d-flex align-items-center justify-content-between">
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="flex-wrap mb-4 d-flex align-itmes-center justify-content-between">
                     <div class="d-flex align-itmes-center me-0 me-md-4">
                        <div>
                           <div class="p-3 mb-2 rounded bg-soft-primary">
                              <svg class="icon-20"  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>                                            
                              </svg>
                           </div>
                        </div>
                        <div class="ms-3">
                           <h5>Status Jumlah Personil Engineering</h5>
                        </div>
                     </div>
                  </div>
                  <div class="mb-4">
                     <div class="flex-wrap d-flex justify-content-between">
                        <h2 class="mb-2">{{$jumlahHeadOffice}}</h2>
                        <div>
                           <span class="badge bg-success rounded-pill"></span>
                        </div>
                     </div>
                     <p class="text-info">Personil Engineering</p>
                  </div>
                  <div class="grid-cols-2 d-grid gap-card">
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="card" data-aos="fade-up" data-aos-delay="800">
                     <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                           <h4 class="card-title text-primary">STATUS IMPLEMENTASI BIM</h4>
                           {{-- <p class="mb-0">Gross Sales</p>           --}}
                        </div>
                     </div>
                     <div class="card-body">
                        <div id="pie-chart-status-implementasi-bim" bukanPrioritas="{{$bukanPrioritas}}" prioritas1="{{$prioritas1}}" prioritas2="{{$prioritas2}}" prioritas3="{{$prioritas3}}"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="card" data-aos="fade-up" data-aos-delay="800">
                     <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                           <h4 class="card-title text-primary">PRODUCTIVITY RATE {{date('Y')}}</h4>
                           {{-- <p class="mb-0">Gross Sales</p>           --}}
                        </div>
                     </div>
                     <div class="card-body">
                        <div id="chart-productivity-rate" productivityJan="{{$productivityJan}}" productivityFeb="{{$productivityFeb}}" productivityMar="{{$productivityMar}}" productivityApr="{{$productivityApr}}" productivityMei="{{$productivityMei}}" productivityJun="{{$productivityJun}}" productivityJul="{{$productivityJul}}" productivityAug="{{$productivityAug}}" productivitySep="{{$productivitySep}}" productivityOct="{{$productivityOct}}" productivityNov="{{$productivityNov}}" productivityDes="{{$productivityDes}}" class="d-main"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-6">
      <div class="row">
         <div class="col-md-12">
            <div class="card" data-aos="fade-up" data-aos-delay="800">
               <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                  <div class="header-title">
                     <h4 class="card-title text-primary">REALISASI IMPLEMENTASI BIM PROYEK</h4>
                     {{-- <p class="mb-0">Gross Sales</p>           --}}
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table mt-3">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Prioritas</th>
                                 <th>Persentase</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Priotitas 1</td>
                                 <td>{{number_format($realisasiPrioritas1, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>Priotitas 2</td>
                                 <td>{{number_format($realisasiPrioritas2, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>Priotitas 3</td>
                                 <td>{{number_format($realisasiPrioritas3, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>4</td>
                                 <td>Bukan Priotitas</td>
                                 <td>{{number_format($realisasiBukanPrioritas, 2)}}%</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

