<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    route::get('export/users', [UserController::class, 'export'])->name('export.users');
    route::get('export/products', [ProductController::class, 'export'])->name('export.products');
    route::get('export/customers', [CustomerController::class, 'export'])->name('export.customers');

    Route::resource('user', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('invoices', InvoiceController::class);

    route::get('settings', [SettingController::class, 'index'])->name('setting.index');
    route::post('store', [SettingController::class, 'store'])->name('setting.store');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
