<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\obatController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// login/register
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login-proses', [loginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register-proses', [registerController::class, 'register_proses'])->name('register.proses');
// miderware
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'] , function(){

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
// obat
Route::get('/obat', [obatController::class, 'index'])->name('obat');
Route::get('/TambahObat', [obatController::class, 'create'])->name('obat.tambah');
Route::post('/TambahObat', [obatController::class, 'store'])->name('obat.store');
Route::get('/EditObat/{id}', [obatController::class, 'edit'])->name('obat.edit');
Route::put('/UpdateObat/{id}', [obatController::class, 'update'])->name('obat.update');
Route::get('/ObatDokter/{id}', [obatController::class, 'destroy'])->name('obat.hapus');
// Dokter
Route::get('/dokter', [dokterController::class, 'index'])->name('dokter');
Route::get('/TambahDokter', [dokterController::class, 'create'])->name('dokter.tambah');
Route::post('/TambahDokter', [dokterController::class, 'store'])->name('dokter.store');
Route::get('/EditDokter/{id}', [dokterController::class, 'edit'])->name('dokter.edit');
Route::put('/UpdateDokter/{id}', [dokterController::class, 'update'])->name('dokter.update');
Route::get('/HapusDokter/{id}', [dokterController::class, 'destroy'])->name('dokter.hapus');
// seller
Route::get('/seller', [sellerController::class, 'index'])->name('seller');
Route::get('/TambahSeller', [sellerController::class, 'create'])->name('seller.tambah');
Route::post('/TambahSeller', [sellerController::class, 'store'])->name('seller.store');
Route::get('/EditSeller/{id}', [sellerController::class, 'edit'])->name('seller.edit');
Route::put('/UpdateSeller/{id}', [sellerController::class, 'update'])->name('seller.update');
Route::get('/HapusSeller/{id}', [sellerController::class, 'destroy'])->name('seller.hapus');
// pesan
Route::get('/pesan/{id}', [PesanController::class, 'index'])->name('pesan');
Route::post('pesan/{id}', [pesanController::class, 'tampil'])->name('pesan');
Route::get('/check-out', [pesanController::class, 'check_out'])->name('chekout');
Route::delete('/checkout/{id}', [pesanController::class, 'delete'])->name('checkout');
Route::get('/konfirmasicheckout', [PesanController::class, 'konfirmasi'])->name('konfirmasipesan');
// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/Hapustransaksi/{id}', [TransaksiController::class, 'destroy'])->name('hapus.transaksi');
});
// Shop
Route::get('/map', [shopController::class, 'map'])->name('shop.map');
Route::get('/shop/indexapotik', [shopController::class, 'index'])->name('shop.indexapotik');
Route::get('/shop/data/{id}', [ShopController::class, 'showObatBySeller'])->name('shop.indexobat');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
