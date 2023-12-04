<?php

use App\Http\Controllers\Achievement;
use App\Http\Controllers\Activity;
use App\Http\Controllers\Csi;
use App\Http\Controllers\KelolaMahasiswa;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DetailAchievement;
use App\Http\Controllers\DetailLicense;
use App\Http\Controllers\DetailTimProyek;
use App\Http\Controllers\DokumenLps;
use App\Http\Controllers\EngineeringActivity;
use App\Http\Controllers\Event;
use App\Http\Controllers\InfraNews;
use App\Http\Controllers\KiKm;
use App\Http\Controllers\Landing;
use App\Http\Controllers\License;
use App\Http\Controllers\Login;
use App\Http\Controllers\Lps;
use App\Http\Controllers\MasterActivity;
use App\Http\Controllers\MonthlyReport;
use App\Http\Controllers\MonthlyReportAdmin;
use App\Http\Controllers\Productivity;
use App\Http\Controllers\Proyek;
use App\Http\Controllers\Rencana;
use App\Http\Controllers\Rkp;
use App\Http\Controllers\Software;
use App\Http\Controllers\TechnicalSupporting;
use App\Http\Controllers\TimProyek;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/unduh-format-excel', [KelolaMahasiswa::class, 'unduhFormatExcel']);
Route::get('/download-file-ki-km/{id}', [KiKm::class, 'downloadFile']);
Route::get('/download-file-hasil-ki-km/{id}', [KiKm::class, 'downloadFileHasil']);
Route::get('/download-file-technical-supporting/{id}', [TechnicalSupporting::class, 'downloadFile']);
Route::get('/download-file-hasil-technical-supporting/{id}', [TechnicalSupporting::class, 'downloadFileHasil']);
Route::get('/download-file-rkp/{id}', [Rkp::class, 'downloadFile']);
Route::get('/download-file-hasil-rkp/{id}', [Rkp::class, 'downloadFileHasil']);

Route::group(['middleware' => 'revalidate'], function () {

    Route::get('/', [Landing::class, 'index'])->name('landing');
    Route::get('/about', [Landing::class, 'about'])->name('about');
    Route::get('/contact', [Landing::class, 'contact'])->name('contact');
    Route::get('/blog', [Landing::class, 'blog'])->name('blog');

    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'loginProcess']);
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/profil', [User::class, 'profil'])->name('profil');
    Route::post('/edit-profil/{id}', [User::class, 'prosesEditProfil']);
    Route::get('/ubah-password', [User::class, 'ubahPassword'])->name('ubah-password');
    Route::post('/ubah-password/{id}', [User::class, 'prosesUbahPassword']);

    Route::get('/daftar-activity', [EngineeringActivity::class, 'index'])->name('daftar-activity');

    Route::get('/permintaan-technical-supporting', [TechnicalSupporting::class, 'permintaan'])->name('permintaan-technical-supporting');
    Route::get('/update-technical-supporting', [TechnicalSupporting::class, 'update'])->name('update-technical-supporting');
    Route::get('/receive-technical-supporting/{id}', [TechnicalSupporting::class, 'receive']);
    Route::get('/updated-technical-supporting/{id}', [TechnicalSupporting::class, 'edit']);
    Route::post('/edit-technical-supporting/{id}', [TechnicalSupporting::class, 'prosesEdit']);

    Route::get('/update-ki-km', [KiKm::class, 'update'])->name('update-ki-km');
    Route::get('/edit-ki-km/{id}', [KiKm::class, 'edit']);
    Route::post('/edit-ki-km/{id}', [KiKm::class, 'prosesEdit']);

    Route::get('/monitoring-rkp', [Rkp::class, 'index'])->name('monitoring-rkp');
    Route::get('/update-dokumen-rkp', [Rkp::class, 'updateDokumen'])->name('update-dokumen-rkp');
    Route::post('/update-dokumen-rkp/{id}', [Rkp::class, 'prosesUpdateDokumen']);

    // export
    Route::post('/export-activity', [EngineeringActivity::class, 'exportExcel']);
    Route::get('/export-rkp', [Rkp::class, 'exportExcel']);
    Route::get('/export-ki-km', [KiKm::class, 'exportExcel']);
    Route::post('/export-technical-support', [TechnicalSupporting::class, 'exportExcel']);
    Route::get('/export-by-team', [Productivity::class, 'exportExcel']);

    Route::get('/input-lps', [Lps::class, 'index'])->name('input-lps');
    Route::post('/tambah-proyek-lps', [Lps::class, 'prosesTambah']);
    Route::post('/update-tanggal-pho/{id_proyek}', [Lps::class, 'updateTanggalPho']);
    Route::get('/hapus-proyek-lps/{id_proyek}', [Lps::class, 'prosesHapus']);
    Route::get('/detail-proyek-lps/{id_proyek}', [Lps::class, 'detail']);
    Route::get('/detail-proyek-lps-tim/{id_proyek}', [Lps::class, 'detailTim']);
    Route::post('/edit-proyek-lps/{id_lps}', [Lps::class, 'prosesEdit']);
    Route::get('/monitoring-lps', [Lps::class, 'monitoring'])->name('monitoring-lps');
    Route::get('/detail-monitoring-lps/{id_proyek}', [Lps::class, 'detailMonitoring']);
    Route::get('/progress-lps', [Lps::class, 'progress'])->name('progress-lps');

    Route::get('/daftar-license', [License::class, 'index'])->name('daftar-license');
    Route::post('/tambah-license', [License::class, 'prosesTambah']);
    Route::post('/edit-license/{id}', [License::class, 'prosesEdit']);
    Route::get('/hapus-license/{id}', [License::class, 'prosesHapus']);
    Route::get('/detail-license/{id}', [License::class, 'detail']);
    Route::get('/progress-license', [License::class, 'progress']);

    Route::post('/tambah-detail-license', [DetailLicense::class, 'prosesTambah']);
    Route::post('/edit-detail-license/{id}', [DetailLicense::class, 'prosesEdit']);
    Route::get('/hapus-detail-license/{id}', [DetailLicense::class, 'prosesHapus']);

    Route::get('/daftar-proyek-csi', [Csi::class, 'index']);
    Route::post('/tambah-proyek-csi', [Csi::class, 'prosesTambah']);
    Route::post('/edit-proyek-csi/{id}', [Csi::class, 'prosesEdit']);
    Route::get('/hapus-proyek-csi/{id}', [Csi::class, 'prosesHapus']);
    Route::get('/detail-proyek-csi/{id}', [Csi::class, 'detail']);
    Route::post('/edit-detail-csi/{id}', [Csi::class, 'updateDetailCsi']);
    Route::get('/monitoring-csi', [Csi::class, 'monitoring']);
    Route::post('/pendapat-csi/{id}', [Csi::class, 'pendapat']);

    Route::get('/rencana-ki-km', [Rencana::class, 'index']);
    Route::get('/rencana-technical-supporting', [Rencana::class, 'technicalSupport']);
    Route::post('/tambah-rencana', [Rencana::class, 'prosesTambah']);
    Route::post('/edit-rencana/{id}', [Rencana::class, 'prosesEdit']);
    Route::get('/hapus-rencana/{id}', [Rencana::class, 'prosesHapus']);
    Route::get('/detail-rencana-ki-km/{id}', [Rencana::class, 'detailKiKm']);
    Route::get('/detail-rencana-technical-supporting/{id}', [Rencana::class, 'detailTechnicalSupport']);
    Route::post('/edit-rencana-detail/{id}', [Rencana::class, 'prosesEditDetail']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/data-activities', [Activity::class, 'index'])->name('data-activities');
        Route::get('/tambah-activities', [Activity::class, 'tambah']);
        Route::get('/edit-activities/{id}', [Activity::class, 'edit']);
        Route::post('/tambah-activities', [Activity::class, 'prosesTambah']);
        Route::post('/edit-activities/{id}', [Activity::class, 'prosesEdit']);
        Route::get('/hapus-activities/{id}', [Activity::class, 'prosesHapus']);

        Route::get('/data-events', [Event::class, 'index'])->name('data-events');
        Route::post('/tambah-events', [Event::class, 'prosesTambah']);
        Route::post('/edit-events/{id}', [Event::class, 'prosesEdit']);
        Route::get('/hapus-events/{id}', [Event::class, 'prosesHapus']);
        
        Route::get('/data-achievement', [Achievement::class, 'index'])->name('data-achievement');
        Route::post('/tambah-achievement', [Achievement::class, 'prosesTambah']);
        Route::post('/edit-achievement/{id}', [Achievement::class, 'prosesEdit']);
        Route::get('/hapus-achievement/{id}', [Achievement::class, 'prosesHapus']);
        Route::get('/detail-achievement/{id}', [Achievement::class, 'detail']);

        Route::post('/tambah-detail-achievement', [DetailAchievement::class, 'prosesTambah']);
        Route::post('/edit-detail-achievement/{id}', [DetailAchievement::class, 'prosesEdit']);
        Route::get('/hapus-detail-achievement/{id}', [DetailAchievement::class, 'prosesHapus']);

        Route::get('/data-news', [InfraNews::class, 'index'])->name('data-news');
        Route::get('/tambah-news', [InfraNews::class, 'tambah']);
        Route::get('/edit-news/{id}', [InfraNews::class, 'edit']);
        Route::post('/tambah-news', [InfraNews::class, 'prosesTambah']);
        Route::post('/edit-news/{id}', [InfraNews::class, 'prosesEdit']);
        Route::get('/hapus-news/{id}', [InfraNews::class, 'prosesHapus']);

        Route::get('/daftar-user', [User::class, 'index'])->name('daftar-user');
        Route::get('/tambah-user', [User::class, 'tambah'])->name('tambah-user');
        Route::post('/tambah-user', [User::class, 'prosesTambah']);
        Route::get('/edit-user/{id}', [User::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [User::class, 'prosesEdit']);
        Route::get('/hapus-user/{id}', [User::class, 'prosesHapus']);

        Route::get('/daftar-proyek', [Proyek::class, 'index'])->name('daftar-proyek');
        Route::get('/tambah-proyek', [Proyek::class, 'tambah'])->name('tambah-proyek');
        Route::post('/tambah-proyek', [Proyek::class, 'prosesTambah']);
        Route::get('/edit-proyek/{id}', [Proyek::class, 'edit'])->name('edit-proyek');
        Route::post('/edit-proyek/{id}', [Proyek::class, 'prosesEdit']);
        Route::get('/hapus-proyek/{id}', [Proyek::class, 'prosesHapus']);
        Route::get('/export-proyek', [Proyek::class, 'exportExcel']);

        Route::get('/daftar-tim-proyek', [TimProyek::class, 'index'])->name('daftar-tim-proyek');
        Route::get('/tambah-tim-proyek', [TimProyek::class, 'tambah'])->name('tambah-tim-proyek');
        Route::post('/tambah-tim-proyek', [TimProyek::class, 'prosesTambah']);
        Route::get('/edit-tim-proyek/{id}', [TimProyek::class, 'edit'])->name('edit-tim-proyek');
        Route::post('/edit-tim-proyek/{id}', [TimProyek::class, 'prosesEdit']);
        Route::get('/hapus-tim-proyek/{id}', [TimProyek::class, 'prosesHapus']);

        Route::get('/daftar-dokumen-lps', [DokumenLps::class, 'index'])->name('daftar-dokumen-lps');
        Route::post('/tambah-dokumen-lps', [DokumenLps::class, 'prosesTambah']);
        Route::post('/edit-dokumen-lps/{id}', [DokumenLps::class, 'prosesEdit']);
        Route::get('/hapus-dokumen-lps/{id}', [DokumenLps::class, 'prosesHapus']);

        Route::post('/tambah-detail-tim-proyek', [DetailTimProyek::class, 'prosesTambah']);
        Route::get('/hapus-detail-tim-proyek/{id}', [DetailTimProyek::class, 'prosesHapus']);

        Route::get('/daftar-monthly-report-admin', [MonthlyReportAdmin::class, 'index'])->name('daftar-monthly-report-admin');
        Route::get('/detail-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'detail'])->name('detail-monthly-report-admin');
        Route::get('/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'edit'])->name('edit-monthly-report-admin');
        Route::post('/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesEdit']);
        Route::get('/hapus-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesHapus']);
        Route::get('/export-all-monthly-report-admin', [MonthlyReportAdmin::class, 'exportExcel']);
        Route::get('/export-proyek-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'exportExcel']);

        Route::get('/pilih-bulan', [MasterActivity::class, 'pilihBulan'])->name('pilih-bulan');
        Route::post('/pilih-bulan', [MasterActivity::class, 'index']);
        Route::post('/tambah-master-activity', [MasterActivity::class, 'prosesTambah']);
        Route::post('/hapus-master-activity', [MasterActivity::class, 'prosesHapus']);

        Route::get('/productivity-by-team', [Productivity::class, 'index'])->name('productivity-by-team');
        Route::post('/productivity-by-team', [Productivity::class, 'index']);

        Route::get('/productivity-by-person', [Productivity::class, 'byPerson'])->name('productivity-by-person');
        Route::post('/productivity-by-person', [Productivity::class, 'byPerson']);
        Route::get('/productivity-by-person/{id_user}/{detail_bulan}', [Productivity::class, 'detailByPerson']);

        Route::get('/progress-technical-supporting', [TechnicalSupporting::class, 'progress']);
        Route::post('/progress-technical-supporting', [TechnicalSupporting::class, 'progress']);

        Route::get('/progress-ki-km', [KiKm::class, 'progress']);
        Route::post('/progress-ki-km', [KiKm::class, 'progress']);

        Route::get('/daftar-software', [Software::class, 'index'])->name('daftar-software');
        Route::get('/tambah-software', [Software::class, 'tambah'])->name('tambah-software');
        Route::post('/tambah-software', [Software::class, 'prosesTambah']);
        Route::get('/edit-software/{id}', [Software::class, 'edit'])->name('edit-software');
        Route::post('/edit-software/{id}', [Software::class, 'prosesEdit']);
        Route::get('/hapus-software/{id}', [Software::class, 'prosesHapus']);
    });

    Route::group(['middleware' => 'headoffice'], function () {

        Route::get('/tambah-activity', [EngineeringActivity::class, 'tambah'])->name('tambah-activity');
        Route::post('/tambah-activity', [EngineeringActivity::class, 'prosesTambah']);
        Route::get('/check-activity', [EngineeringActivity::class, 'check'])->name('check-activity');
        Route::get('/check-activity/{id}', [EngineeringActivity::class, 'checkProses']);
        Route::get('/edit-activity/{id}', [EngineeringActivity::class, 'edit'])->name('edit-activity');
        Route::post('/edit-activity/{id}', [EngineeringActivity::class, 'prosesEdit']);
        Route::get('/hapus-activity/{id}', [EngineeringActivity::class, 'prosesHapus']);

        Route::get('/pengajuan-ki-km', [KiKm::class, 'pengajuan'])->name('pengajuan-ki-km');
        Route::get('/receive-ki-km/{id}', [KiKm::class, 'receive']);

        // Route::get('/monitoring-rkp', [Rkp::class, 'index'])->name('monitoring-rkp');
        Route::get('/tambah-rkp', [Rkp::class, 'tambah'])->name('tambah-rkp');
        Route::post('/tambah-rkp', [Rkp::class, 'prosesTambah']);
        Route::get('/update-rkp', [Rkp::class, 'update'])->name('update-rkp');
        Route::get('/edit-rkp/{id}', [Rkp::class, 'edit']);
        Route::post('/edit-rkp/{id}', [Rkp::class, 'prosesEdit']);


        // Route::get('/review-rkp', [\App\Http\Controllers\Rkp::class, 'tambah'])->name('tambah');
        // Route::get('/receive-rkp/{id}', [Rkp::class, 'receive']);
        // Route::get('/edit-rkp/{id}', [\App\Http\Controllers\Rkp::class, 'edit']);
        // Route::post('/edit-rkp/{id}', [\App\Http\Controllers\Rkp::class, 'prosesEdit']);

    });

    Route::group(['middleware' => 'timproyek'], function () {
        Route::get('/pilih-proyek', [MonthlyReport::class, 'pilihProyek'])->name('pilih-proyek');
        Route::post('/pilih-proyek', [MonthlyReport::class, 'prosesPilihProyek']);
        Route::get('/tambah-monthly-report', [MonthlyReport::class, 'tambah'])->name('tambah-monthly-report');
        Route::post('/tambah-monthly-report', [MonthlyReport::class, 'prosesTambah']);
        Route::get('/daftar-monthly-report', [MonthlyReport::class, 'index'])->name('daftar-monthly-report');
        Route::get('/detail-monthly-report/{id_proyek}', [MonthlyReport::class, 'detail'])->name('detail-monthly-report');
        Route::get('/edit-monthly-report/{id}', [MonthlyReport::class, 'edit'])->name('edit-monthly-report');
        Route::post('/edit-monthly-report/{id}', [MonthlyReport::class, 'prosesEdit']);
        Route::get('/hapus-monthly-report/{id}', [MonthlyReport::class, 'prosesHapus']);
        Route::get('/export-all-monthly-report', [MonthlyReport::class, 'exportExcel']);
        Route::get('/export-proyek-monthly-report/{id_proyek}', [MonthlyReport::class, 'exportExcel']);

        Route::get('/monitoring-technical-supporting', [TechnicalSupporting::class, 'indeX'])->name('monitoring-technical-supporting');
        Route::get('/tambah-technical-supporting', [TechnicalSupporting::class, 'tambah'])->name('tambah-technical-supporting');
        Route::post('/tambah-technical-supporting', [TechnicalSupporting::class, 'prosesTambah']);

        Route::get('/monitoring-ki-km', [KiKm::class, 'index'])->name('monitoring-ki-km');
        Route::get('/tambah-ki-km', [KiKm::class, 'tambah'])->name('tambah-ki-km');
        Route::post('/tambah-ki-km', [KiKm::class, 'prosesTambah']);

        Route::get('/daftar-proyek-lps', [Lps::class, 'monitoringTimProyek'])->name('monitoring-tim-proyek');
    });
});
