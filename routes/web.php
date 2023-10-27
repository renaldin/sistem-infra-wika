<?php

use App\Http\Controllers\KelolaMahasiswa;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Login;
use App\Http\Controllers\Projek;
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

        Route::get('/daftar-projek', [Projek::class, 'index'])->name('daftar-projek');
        Route::get('/tambah-projek', [Projek::class, 'tambah'])->name('tambah-projek');
        Route::post('/tambah-projek', [Projek::class, 'prosesTambah']);
        Route::get('/edit-projek/{id}', [Projek::class, 'edit'])->name('edit-projek');
        Route::post('/edit-projek/{id}', [Projek::class, 'prosesEdit']);
        Route::get('/hapus-projek/{id}', [Projek::class, 'prosesHapus']);
    });

    Route::group(['middleware' => 'headoffice'], function () {
    });

    Route::group(['middleware' => 'timproyek'], function () {
    });
});
