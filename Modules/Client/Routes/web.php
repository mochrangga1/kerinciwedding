<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\AuthController;
use Modules\Client\Http\Controllers\ClientController;
use Modules\Client\Http\Controllers\TamuController;
use Modules\Client\Http\Controllers\UndanganController;
use Modules\Client\Http\Controllers\WhatsappController;

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

Route::prefix('dash')->group(function() {
    Route::post('/client/{kode}', [AuthController::class, 'clientAuthenticate'])->name('clientAuth');
    Route::get('/client/{kode}', [ClientController::class, 'dash_client'])->name('clientDash')->middleware(['web']);
    Route::get('/client/whatsapp/{kode}', [WhatsappController::class, 'pengaturan'])->name('whatsappDash')->middleware(['web']);
    Route::post('/client/whatsapp/{kode}', [WhatsappController::class, 'integrasi'])->name('whatsappStore')->middleware(['web']);
    Route::delete('/client/whatsapp/{kode}', [WhatsappController::class, 'hapus_integrasi'])->name('whatsappDestroy')->middleware(['web']);

    Route::get('/chart-data', [UndanganController::class, 'undangan_chart']);
    Route::get('/undangan/client/{kode}', [UndanganController::class, 'undangan_code']);
    Route::get('/undangan/{client}/tamu/{code}', [UndanganController::class, 'list_tamu']);
    Route::get('/undangan/{client}/buku-tamu/{code}', [UndanganController::class, 'buku_tamu']);
    Route::post('/undangan/{client}/tamu/{code}/whatsapp', [UndanganController::class, 'kirim_undangan']);

    Route::get('/add-tamu/{client}/{code}', [TamuController::class, 'tamu_client']);
    Route::get('/get-data-tamu/{id}', [TamuController::class, 'get_tamu']);
    Route::post('/simpan-tamu/{code}', [TamuController::class, 'save_tamu']);
    Route::post('/add-tamu', [TamuController::class, 'add_tamu']);
    Route::post('/import-tamu', [TamuController::class, 'import_tamu']);
    Route::post('/update-tamu', [TamuController::class, 'update_tamu']);
    Route::delete('/delete-tamu/{id}', [TamuController::class, 'delete_tamu']);
});
