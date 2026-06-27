<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController; // Frontend

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\EventController as EventAdminController;

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

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('admin')->name('admin.')->group(function () {

    // Login Admin
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Area yang dilindungi
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', EventAdminController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories.index');

        Route::resource('partners', PartnerController::class);




    });

});

    Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
            ->name('checkout.create');

        Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
            ->name('checkout.store');
 Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])
            ->name('checkout.payment');
