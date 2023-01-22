<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\pegawaicontroller;
use App\Http\Controllers\jeniscontroller;
use App\Http\Controllers\suppliercontroller;
use App\Http\Controllers\PembeliController;

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
    return view('welcome');
});

route::get('/dashboard', [admincontroller::class, 'index']);
route::get('/tabel1', [admincontroller::class, 'tabel']);

route::get('/datapegawai', [pegawaicontroller::class, 'data']);
route::get('/penambahanpegawai', [pegawaicontroller::class, 'tambahpegawai']);

route::get('/tampilkandatapegawai/{id}', [pegawaicontroller::class, 'tampilkandatapegawai']);
route::post('/updatepegawai/{id}', [pegawaicontroller::class, 'updatepegawai']);
route::get('/deletepegawai/{id}', [pegawaicontroller::class, 'deletepegawai']);

route::post('/insertpegawai', [pegawaicontroller::class, 'insertpegawai']);

route::get('/tambahjenis', [jeniscontroller::class, 'tambahjenis']);
route::post('/inserthandphone', [jeniscontroller::class, 'inserthandphone']);

route::get('/tampilkandatahp/{id}', [jeniscontroller::class, 'tampilkandatahp']);
route::post('/updatejenis/{id}', [jeniscontroller::class, 'updatejenis']);
route::get('/deletejenis/{id}', [jeniscontroller::class, 'deletejenis']);

route::get('/datasupplier', [suppliercontroller::class, 'datasupplier']);

route::get('/tambahsupplier', [suppliercontroller::class, 'tambahsupplier']);
route::post('/insertsupplier', [suppliercontroller::class, 'insertsupplier']);

route::get('/tampilkandata/{id}', [suppliercontroller::class, 'tampilkandata']);
route::post('/updatedata/{id}', [suppliercontroller::class, 'updatedata']);
route::get('/deletedata/{id}', [suppliercontroller::class, 'deletedata']);

route::get('/datapembeli', [PembeliController::class, 'datapembeli']);
route::get('/tambahpembeli', [PembeliController::class, 'tambahpembeli']);
route::post('/insertpembeli', [PembeliController::class, 'insertpembeli']);






