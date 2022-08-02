<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tudien', function () {
    return view('tudien');
});
Route::post('/tudien', function (Request $request) {
    $flag = 0;
    $vn = $request->vn;
    $tudien = [
        "hello" => "xin chào",
        "how" => "thế nào",
        "book" => "quyển vở",
        "computer" => "máy tính",
        "mouse" => "chuột",
        "cat" => "con mèo",
        "dog" => "con chó",
        "duck" => "con vịt",
        "pig" => " con heo"
    ];
    foreach ($tudien as $key => $value) {
        if ($vn == $key) {
            $flag = 1;
            echo "<h1>Từ '$vn' có nghĩa là : $value</h1>";
        }
    }
    if ($flag == 0) {
        echo "<h1> Không có từ nào </h1>";
    }
    return view('ketqua');
});

Route::get('add',function(){
    return view('crud.add');
});
Route::post('create',function(Request $request){
    dd($request->all());
});

Route::get('edit/{id?}',function($id=0){
    return view('crud.edit');
});
Route::put('update',function(Request $request){
    dd($request->all());
});

Route::get('delete/{id?}',function($id=0){
    return view('crud.delete');
});
Route::delete('destroy{id?}',function(){
    dd(123);
});


