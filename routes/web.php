<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/book-table', [BookingController::class, 'showBookingForm'])->name('book-table');
    Route::post('/book-table', [BookingController::class, 'bookTable'])->name('book-table.submit');
});


Route::get('/admin/access', [AdminAuthController::class, 'showAccessForm'])->name('admin.access');
Route::post('/admin/access', [AdminAuthController::class, 'verifyAccess'])->name('admin.verify');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::prefix('reservations')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminPanelController::class, 'index'])->name('admin.dashboard');
    Route::get('/accept/{id}', [ReservationController::class, 'accept'])->name('reservations.accept');
    Route::get('/reject/{id}', [ReservationController::class, 'reject'])->name('reservations.reject');
});





Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});


