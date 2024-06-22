<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\TemaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('admin');
});

// Route::get('/undangan', function () {
//     return view('layout.add-undangan');
// })->middleware('auth');

// Route::get('/testtamu', [Controller::class, 'testtamu']);
// Route::get('/testclient', [Controller::class, 'testclient']);
// Route::get('/testsesi', [Controller::class, 'testsesi']);
// Route::get('/undangan', [UndanganController::class, 'create_undangan'])->middleware('auth');
// // Route::get('/tema', [TemaController::class, 'index'])->middleware('auth');

// Route::get('/undangan/{id}/sesi/{sesi}/list-tamu/client/{client}/', [UndanganController::class, 'list_tamu']);
// Route::get('/client/{id}', [UndanganController::class, 'undangan_client']);

// // Route::get('/undangan/{id}/sesi/{sesi}/client/{client}/add-tamu', [UndanganController::class, 'tamu_client']);
// Route::post('/kehadiran/tamu', [UndanganController::class, 'kehadiran_tamu']);
// Route::get('/chart-tamu/{kode}', [UndanganController::class, 'chart_tamu']);
// Route::get('/chart-kehadiran/{kode}', [UndanganController::class, 'chart_kehadiran']);
// Route::get('/chart-baca/{kode}', [UndanganController::class, 'chart_baca']);
// // Route::get('/dash/client', [AuthController::class, 'loginClient'])->name('loginClient')->middleware('guest');
// Route::get('/hitung/{kode}', [UndanganController::class, 'hitung_undangan']);
