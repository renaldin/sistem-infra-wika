<?php

use App\Http\Controllers\KelolaMahasiswa;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DetailTimProyek;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Login;
use App\Http\Controllers\MonthlyReport;
use App\Http\Controllers\Proyek;
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

    // Home
    Route::get('/', [Landing::class, 'index'])->name('landing');
    Route::get('/about', [Landing::class, 'about'])->name('about');
    Route::get('/contact', [Landing::class, 'contact'])->name('contact');

    // Login User
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'loginProcess']);
    // Route::get('/admin', [Login::class, 'admin'])->name('admin');

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    // dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    
    
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

    });

    Route::group(['middleware' => 'headoffice'], function () {
    });

    Route::group(['middleware' => 'timproyek'], function () {
        Route::get('/pilih-proyek', [MonthlyReport::class, 'pilihProyek'])->name('pilih-proyek');
        Route::post('/pilih-proyek', [MonthlyReport::class, 'prosesPilihProyek']);
        Route::get('/tambah-monthly-report', [MonthlyReport::class, 'tambah'])->name('tambah-monthly-report');
        Route::post('/tambah-monthly-report', [MonthlyReport::class, 'prosesTambah']);
    });
});
