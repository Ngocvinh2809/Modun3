<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

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
    return view('welcome');
});
Route::get('/products', function () {   
    return view('products'); 
});
Route::post('/products', function (Request $request) {
   $mota = $request->mota;
   $gia = $request->gia;
   $tile = $request->tile;
   $DiscountAmount = $gia * $tile * 0.1;
   $DiscountPrice = $gia - $DiscountAmount;
   return view('show_discount_amount', compact(['DiscountPrice', 'DiscountAmount', 'tile', 'gia', 'mota']));
});