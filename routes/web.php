<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/profil', 'profil');
Route::view('/katalog', 'katalog');
Route::view('/bantuan', 'bantuan');

Route::get('/event', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// DASHBOARD (sesuai permintaan kamu: /dashboard)
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

/*
| Events Admin
*/
Route::get('/admin/events', [EventController::class, 'index'])
    ->name('admin.events.index');

/*
| Transactions Admin
*/
Route::get('/admin/transactions', function () {
    return view('admin.transactions');
})->name('admin.transactions');

/*
| Categories Admin
*/
Route::get('/admin/categories', [CategoryController::class, 'index'])
    ->name('admin.categories.index');
