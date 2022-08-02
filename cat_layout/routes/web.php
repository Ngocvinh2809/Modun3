<?php

use App\Models\Book;
use App\Models\Student;
use App\Models\Type;
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

Route::get('/index', function () {
    return view('index');
});
Route::get('/hasMany', function () {
    $item = Type::find(1);
    dd($item->books->toArray());
});
Route::get('/belongsTo', function () {
    $item = Book::find(2);
    dd($item->type->toArray());
});
Route::get('/belongsToMany', function () {
    $item = Student::find(3);
    dd($item->borrow_books);
});

