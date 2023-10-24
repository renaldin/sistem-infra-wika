<?php

use App\Http\Controllers\KelolaMahasiswa;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Log;
use App\Http\Controllers\Pengaturan;
use App\Http\Controllers\KelompokUKT;
use App\Http\Controllers\Kriteria;
use App\Http\Controllers\Landing;
use App\Http\Controllers\NilaiKriteria;
use App\Http\Controllers\Login;
use App\Http\Controllers\PenangguhanUKT;
use App\Http\Controllers\PenurunanUKT;
use App\Http\Controllers\PenentuanUKT;
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
    });

    Route::group(['middleware' => 'headoffice'], function () {
    });

    Route::group(['middleware' => 'timproyek'], function () {
    });
});
