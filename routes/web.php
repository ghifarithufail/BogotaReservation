<?php

use App\Http\Controllers\CriticController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fe\ContusController;
use App\Http\Controllers\fe\HomeController;
use App\Http\Controllers\fe\PaymentController;
use App\Http\Controllers\fe\RsvpController;
use App\Http\Controllers\fe\StoryController;
use App\Http\Controllers\LogController;
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

// front-end 
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact-us', [ContusController::class, 'index'])->name('contact');
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/fixpayment', [PaymentController::class, 'fixPayment'])->name('fixPayment');
Route::get('/reservations', [RsvpController::class, 'rsvp'])->name('rsvp');
Route::get('/our-story', [StoryController::class, 'story'])-> name('story');
Route::post('critics/post', [ContusController::class, 'critics'])->name('critic.store');




Route::get('/data', [ReservationController::class, 'data']);
// reservations
Route::group(['prefix' => 'reservation'], function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations');
    Route::get('/data', [ReservationController::class, 'index'])->name('reservations.data');
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/store', [ReservationController::class, 'store'])->name('reservations.store');
});
Route::get('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::post('/reservation/{id}', [ReservationController::class, 'post'])->name('reservations.post');
Route::get('/invoice/{id}', [ReservationController::class, 'invoice'])->name('invoice');
Route::post('/reservation/store', [ReservationController::class, 'payment'])->name('reservations.store');
Route::get('/status/{id}', [RsvpController::class, 'status'])-> name('');
Route::get('/invoice/download/{id}', [ReservationController::class, 'download'])->name('invoice/download');


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logins', [UserController::class, 'logins'])->name('logins');
Route::post('/login/auth', [UserController::class, 'auth'])->name('login/auth');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user')->middleware('hakakses:1');

    Route::get('/contoh', [TableController::class, 'contoh']);
    Route::get('/log/user', [LogController::class, 'logUser'])->name('log/user')->middleware('hakakses:1');
    Route::get('/log/reservation', [LogController::class, 'logReservation'])->name('log/reservation')->middleware('hakakses:1');
    Route::get('/log/table', [LogController::class, 'logTable'])->name('log/table')->middleware('hakakses:1');
    // reservations
    Route::group(['prefix' => 'reservation'], function () {
        Route::get('/', [ReservationController::class, 'index'])->name('reservations');
        Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
        // Route::post('/store', [ReservationController::class, 'payment'])->name('reservations.store');
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
        Route::get('/', [UserController::class, 'index'])->name('user')->middleware('hakakses:1,2');
        Route::get('/create', [UserController::class, 'create'])->name('user/create')->middleware('hakakses:1,2');
        Route::post('/store', [UserController::class, 'store'])->name('user/store')->middleware('hakakses:1,2');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user/edit')->middleware('hakakses:1,2');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user/update')->middleware('hakakses:1,2');
    });


    Route::group(['prefix' => 'critics'], function () {
        Route::get('/', [CriticController::class, 'index'])->name('critics')->middleware('hakakses:1,2,3');

    });
// //home
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/homes', [HomeController::class, 'home'])->name('default');
// Route::get('/table', [TableController::class, 'create'])->name('table.create');
// Route::post('/table-post', [TableController::class, 'store'])->name('table.store');


    //tables
    Route::group(['prefix' => 'table'], function () {
        Route::get('/', [TableController::class, 'index'])->name('tables')->middleware('hakakses:1,2,3');
        Route::get('/create', [TableController::class, 'create'])->name('table.create')->middleware('hakakses:1,2,3');
        Route::post('/post', [TableController::class, 'store'])->name('table.store')->middleware('hakakses:1,2,3');
        Route::get('/edit/{id}', [TableController::class, 'edit'])->name('table/edit')->middleware('hakakses:1,2,3');
        Route::post('/update/{id}', [TableController::class, 'update'])->name('table/update')->middleware('hakakses:1,2,3');

    });

    //TEST PUSHER
    Route::get('notif', [ReservationController::class, 'notif']);

});
