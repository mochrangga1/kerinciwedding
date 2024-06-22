<?php

use Illuminate\Support\Facades\Route;
use Modules\Undangan\Http\Controllers\UndanganController;

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

Route::prefix('undangan')->group(function() {
    Route::get('/{sesi}', [UndanganController::class, 'undangan']);
    Route::get('/unique/{kode}', [UndanganController::class, 'undangan_show']);
    Route::post('/rsvp/{kode}', [UndanganController::class, 'rsvp']);
});
