<?php

use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/',[CartController::class,'index'])->name('cart.index');
Route::get('/list',[CartController::class,'list'])->name('cart.list');
Route::get('/addToCart/{id}',[CartController::class,'addToCart'])->name('addToCart');
Route::get('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
Route::patch('update-cart}', [ProductController::class, 'update'])->name('update.cart');