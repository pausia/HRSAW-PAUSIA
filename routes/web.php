<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\ResultController;
use App\Models\Matriks;
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

Route::get('/', function () {
    return view('landingpagewelcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::resource('history', HistoryController::class);

Route::get('/user/history', [HistoryController::class, 'tampilHistory'])->name('user.history');
Route::get('/user/alternatif', [AlternatifController::class, 'tampilAlternatif'])->name('user.alternatif');
// add data
Route::post('alternatives/add', [AlternatifController::class, 'storeAlternatif'])->name('alternatives.store');
Route::delete('/alternatif/{id}', [AlternatifController::class, 'deleteAlternatif'])->name('alternatif.delete');

Route::get('/alternatif/edit/{id}', [AlternatifController::class, 'updateAlternatif'])->name('alternatif.update');
Route::post('/alternatif/edit/{id}', [AlternatifController::class, 'editAlternatif'])->name('alternatif.edit');

// Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');

// Route::post('alternatives/add', [AlternatifController::class, 'store'])->name('alternatives.store');

Route::get('/user/bobot', [BobotController::class, 'tampilBobot'])->name('user.bobot');
Route::post('bobot/add', [BobotController::class, 'storebobot'])->name('bobot.store');
Route::delete('/bobot/{id}', [BobotController::class, 'deleteBobot'])->name('bobot.delete');
Route::get('/bobot/edit/{id}', [BobotController::class, 'updateBobot'])->name('bobot.update');
Route::post('/bobot/edit/{id}', [BobotController::class, 'editBobot'])->name('bobot.edit');

Route::get('/user/matriks', [MatriksController::class, 'tampilMatriks'])->name('user.matriks');
Route::post('matriks/add', [MatriksController::class, 'storeMatriks'])->name('matriks.store');
Route::delete('/matriks/{id}', [MatriksController::class, 'deleteMatriks'])->name('matriks.delete');
Route::get('/matriks/edit/{id}', [MatriksController::class, 'updateMatriks'])->name('matriks.update');
Route::post('/matriks/edit/{id}', [BobotController::class, 'editMatriks'])->name('matriks.edit');


Route::get('/user/result', [ResultController::class, 'tampilResult'])->name('user.result');
Route::get('/perform-saw', 'ResultController@performSAW');




