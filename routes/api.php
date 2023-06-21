<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SimpanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PembayaranController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AkunController::class, 'login']);
Route::post('/register', [AkunController::class, 'register']);

Route::post('/update', [UserController::class, 'update']);

Route::get('/dataproduk', [ProdukController::class, 'data']);

Route::post('/tambahkeranjang', [KeranjangController::class, 'tambah']);
Route::post('/datakeranjang', [KeranjangController::class, 'getData']);
Route::post('/hapuskeranjang', [KeranjangController::class, 'hapusdata']);

Route::post('/tambahsimpan', [SimpanController::class, 'tambah']);
Route::post('/datasimpan', [SimpanController::class, 'getData']);
Route::post('/hapussimpan', [SimpanController::class, 'hapusdata']);

Route::post('/dataantrian', [AntrianController::class, 'getdata']);
Route::post('/tambahantrian', [AntrianController::class, 'tambah']);
Route::post('/hapusantrian', [AntrianController::class, 'hapus']);

Route::post('/tambahpembayaran', [PembayaranController::class, 'add']);
Route::post('/gambarpembayaran', [PembayaranController::class, 'datagambar']);

Route::post('/datatransaksi', [TransaksiController::class, 'getData']);

Route::post('/datadetailtransaksi', [DetailTransaksiController::class, 'getData']);

