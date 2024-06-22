<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AuthController;
use Modules\Admin\Http\Controllers\ClientController;
use Modules\Admin\Http\Controllers\UndanganController;

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

Route::prefix('admin')->group(function() {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

    Route::get('/user', [AdminController::class, 'show_user'])->middleware('super');
    Route::post('/user', [AdminController::class, 'add_user']);

    Route::get('/client', [ClientController::class, 'list_client'])->middleware('auth');
    Route::get('/get-data-client/{id}', [ClientController::class, 'get_client']);
    Route::post('/add-client', [ClientController::class, 'addclient']);
    Route::post('/update-client', [ClientController::class, 'update_client']);

    Route::get('/undangan', [UndanganController::class, 'list_undangan'])->middleware('auth');
    Route::get('/fetch-undangan/{id}', [UndanganController::class, 'fetch_undangan']);
    Route::post('/add-undangan', [UndanganController::class, 'add_undangan'])->middleware('auth');
    Route::post('/update-undangan/{id}', [UndanganController::class, 'update_undangan']);
    Route::delete('/delete-undangan/{id}', [UndanganController::class, 'delete_undangan']);
});
