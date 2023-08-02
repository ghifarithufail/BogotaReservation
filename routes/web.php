<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
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
    return view('welcome');
});


Route::get('/contoh', [TableController::class, 'contoh']);
// reservations
Route::group(['prefix' => 'reservation'], function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations');
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/store', [ReservationController::class, 'store'])->name('reservations.store');
});
Route::get('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::post('/reservation/{id}', [ReservationController::class, 'post'])->name('reservations.post');
Route::get('/invoice/{id}', [ReservationController::class, 'invoice'])->name('invoice');
Route::get('/reservation-arrival', [ReservationController::class, 'arrival'])->name('reservations.arrival');
Route::get('/reservation-report', [ReservationController::class, 'report'])->name('reservations.report');

Route::post('/reservation-arrival/{id}', [ReservationController::class, 'updateArriving'])->name('update.reservation.arrival');
Route::post('/reservation-download', [ReservationController::class, 'download'])->name('reservation.download');








//tables
Route::group(['prefix' => 'table'], function () {
    Route::get('/', [TableController::class, 'index'])->name('tables');
    Route::get('/create', [TableController::class, 'create'])->name('table.create');
    Route::post('/post', [TableController::class, 'store'])->name('table.store');
});

//TEST PUSHER
Route::get('notif', [ReservationController::class, 'notif']);


//REPORT
Route::get('/report', [ReportController::class, 'index'])->name('report');

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/homes', [HomeController::class, 'home'])->name('default');
// Route::get('/table', [TableController::class, 'create'])->name('table.create');
// Route::post('/table-post', [TableController::class, 'store'])->name('table.store');

