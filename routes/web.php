<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MerkController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

//Master Item
Route::get('/master-barang', [BarangController::class, 'index'])->name('master.barang.index');
Route::get('/tambah-master-barang', [BarangController::class, 'add'])->name('master.barang.tambah');
Route::post('/simpan-master-barang',[BarangController::class,'store'])->name('master.barang.simpan');
Route::get('/detail-master-barang/{id}', [BarangController::class, 'detail'])->name('master.barang.detail');
Route::post('/update-master-barang{id}',[BarangController::class,'update'])->name('master.barang.update');

Route::post('/ajax-type-barang', [BarangController::class, 'ajaxType']);

//Master Jenis
Route::get('/master-jenis', [JenisController::class, 'index'])->name('master.jenis.index');
Route::view('/tambah-master-jenis', 'master.jenis.add')->name('master.jenis.tambah');
Route::post('/simpan-master-jenis',[JenisController::class,'store'])->name('master.jenis.simpan');
Route::get('/detail-master-jenis/{id}',[JenisController::class,'detail'])->name('master.jenis.detail');
Route::post('/update-master-jenis/{id}',[JenisController::class,'update'])->name('master.jenis.update');


//Master Merk
Route::get('/master-merk', [MerkController::class, 'index'])->name('master.merk.index');
Route::view('/tambah-master-merk', 'master.merk.add')->name('master.merk.tambah');
Route::post('/simpan-master-merk',[MerkController::class,'store'])->name('master.merk.simpan');
Route::get('/detail-master-merk/{id}',[MerkController::class,'detail'])->name('master.merk.detail');
// Route::post('/update-master-jenis/{id}',[JenisController::class,'update'])->name('master.jenis.update');


