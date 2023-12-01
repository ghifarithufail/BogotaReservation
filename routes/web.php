<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/auth', [UserController::class, 'auth'])->name('login/auth');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user');


    Route::get('/contoh', [TableController::class, 'contoh']);
    // reservations
    Route::group(['prefix' => 'reservation'], function () {
        Route::get('/', [ReservationController::class, 'index'])->name('reservations');
        Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
        Route::post('/store', [ReservationController::class, 'payment'])->name('reservations.store');
    });

    Route::get('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::post('/reservation/{id}', [ReservationController::class, 'post'])->name('reservations.post');
    Route::get('/invoice/{id}', [ReservationController::class, 'invoice'])->name('invoice');
    Route::get('/reservation-arrival', [ReservationController::class, 'arrival'])->name('reservations.arrival');
    Route::get('/reservation-report', [ReportController::class, 'report'])->name('reservations.report');

    Route::post('/reservation-arrival/{id}', [ReservationController::class, 'updateArriving'])->name('update.reservation.arrival');
    Route::get('/reservation-cencel/{id}', [ReservationController::class, 'cencel'])->name('reservation.cencel');
    // Route::post('/reservation-download', [ReservationController::class, 'download'])->name('reservation.download');

    Route::get('/reservation/download', [ReportController::class, 'download'])->name('reservations.download');
    Route::post('/report_table', [ReportController::class, 'report_table'])->name('reservations.report.table');
    Route::post('/report_sukses', [ReportController::class, 'report_success'])->name('reservations.report.sukses');
    Route::post('/report_gagal', [ReportController::class, 'report_failed'])->name('reservations.report.gagal');


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user/create');
        Route::post('/store', [UserController::class, 'store'])->name('user/store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user/edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user/update');
    });


    //tables
    Route::group(['prefix' => 'table'], function () {
        Route::get('/', [TableController::class, 'index'])->name('tables');
        Route::get('/create', [TableController::class, 'create'])->name('table.create');
        Route::post('/post', [TableController::class, 'store'])->name('table.store');
    });

    //TEST PUSHER
    Route::get('notif', [ReservationController::class, 'notif']);


    //REPORT
    // Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/index', [ReportController::class, 'index'])->name('chart');

    //home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/dashboard', [HomeController::class, 'template'])->name('template');
    Route::get('/example', [HomeController::class, 'example'])->name('example');
    Route::get('/homes', [HomeController::class, 'home'])->name('default');
    // Route::get('/table', [TableController::class, 'create'])->name('table.create');
    // Route::post('/table-post', [TableController::class, 'store'])->name('table.store');

});
