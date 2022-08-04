<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dondathang', function () {
//     return view('dondathang.index');
// });
Route::get('login', [LoginController::class, 'showform'])->name('login');
Route::get('register', [LoginController::class, 'show_register']);
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::post('check_login', [LoginController::class, 'login'])->name('check_login');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::middleware(['PreventBackHistory'])->group(function () {

        //san pham
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/create', [ProductController::class, 'store'])->name('product.store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/{id}/edit', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
        });

        //khach hang
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::post('/create', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::post('/{id}/edit', [CustomerController::class, 'update'])->name('customer.update');
            Route::delete('/{id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        });

        //nhan vien
        Route::group(['prefix' => 'staff'], function () {
            Route::get('/', [StaffController::class, 'index'])->name('staff.list');
            Route::get('/create', [StaffController::class, 'create'])->name('staff.create');
            Route::post('/create', [StaffController::class, 'store'])->name('staff.store');
            Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
            Route::post('/{id}/edit', [StaffController::class, 'update'])->name('staff.update');
            Route::delete('/{id}/destroy', [StaffController::class, 'destroy'])->name('staff.destroy');
        });


        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::get('/list', [CartController::class, 'list'])->name('cart.list');
        Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
        Route::delete('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
        Route::patch('update-cart}', [ProductController::class, 'update'])->name('update.cart');
    });
});



   



// Route::get('/',[LoginController::class,'index']);
// Route::get('/createe', [LoginController::class,'create']);
// Route::get('/{id}/edit',[LoginController::class,'edit']);