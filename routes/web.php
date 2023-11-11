<?php

use App\Http\Controllers\KelolaMahasiswa;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DetailTimProyek;
use App\Http\Controllers\EngineeringActivity;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Login;
use App\Http\Controllers\MasterAcitvity;
use App\Http\Controllers\MasterActivity;
use App\Http\Controllers\MonthlyReport;
use App\Http\Controllers\MonthlyReportAdmin;
use App\Http\Controllers\Productivity;
use App\Http\Controllers\Proyek;
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

Route::group(['middleware' => 'revalidate'], function () {

    Route::get('/', [Landing::class, 'index'])->name('landing');
    Route::get('/about', [Landing::class, 'about'])->name('about');
    Route::get('/contact', [Landing::class, 'contact'])->name('contact');
    
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
    
    
    Route::group(['middleware' => 'admin'], function () {
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

        Route::get('/daftar-tim-proyek', [TimProyek::class, 'index'])->name('daftar-tim-proyek');
        Route::get('/tambah-tim-proyek', [TimProyek::class, 'tambah'])->name('tambah-tim-proyek');
        Route::post('/tambah-tim-proyek', [TimProyek::class, 'prosesTambah']);
        Route::get('/edit-tim-proyek/{id}', [TimProyek::class, 'edit'])->name('edit-tim-proyek');
        Route::post('/edit-tim-proyek/{id}', [TimProyek::class, 'prosesEdit']);
        Route::get('/hapus-tim-proyek/{id}', [TimProyek::class, 'prosesHapus']);
        
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

    });

    Route::group(['middleware' => 'headoffice'], function () {

        Route::get('/tambah-activity', [EngineeringActivity::class, 'tambah'])->name('tambah-activity');
        Route::post('/tambah-activity', [EngineeringActivity::class, 'prosesTambah']);
        Route::get('/check-activity', [EngineeringActivity::class, 'check'])->name('check-activity');
        Route::get('/check-activity/{id}', [EngineeringActivity::class, 'checkProses']);
        Route::get('/edit-activity/{id}', [EngineeringActivity::class, 'edit'])->name('edit-activity');
        Route::post('/edit-activity/{id}', [EngineeringActivity::class, 'prosesEdit']);
        Route::get('/hapus-activity/{id}', [EngineeringActivity::class, 'prosesHapus']);

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
    });
});
