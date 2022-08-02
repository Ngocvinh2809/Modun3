<?php

use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Psy\debug;

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

Route::prefix('admin')->group( function(){
    //admin/profile/edit
    Route::prefix('profile')->group( function(){
        Route::get('edit' , function(){
            dd('edit');
        });
    } ); 
    //admin/profile/update
    Route::get('profile/update' , function(){
        dd('update');
    });
});

Route::get('/dashboard', function(){

    return view('layout.admin.dashboar');
});
Route::get('/master', function(){

    return view('layout.admin.master');
});
Route::get('/login', function(){
    return view('layout.sign_in.login');
})->name('login');

Route::get('/register', function(){
    return view('layout.sign_in.register');
})->name('register');


// Tạo 1 nhóm route với tiền tố customer
Route::prefix('customer')->group(function () {
    // Route::resource('index', [testController::class]);
    //http://127.0.0.1:8000/customer
    // trang danhs sach
    Route::get('/', [testController::class,'index'])->name('customer.index');

     //trang them moi
    Route::get('/create',[testController::class,'create'])->name('customer.create');

    //luu moi
    Route::post('/store', [testController::class,'store'])->name('customer.store');

    // Hiển thị thông tin chi tiết khách hàng có mã định danh id
    Route::get('/{id}',[testController::class,'show'])->name('customer.show');

    // Hiển thị Form chỉnh sửa thông tin khách hàng
    Route::get('/{id}/edit', [testController::class,'edit'])->name('customer.edit');
       
    // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
    Route::put('/{id}',[testController::class,'update'])->name('customer.update');

    // Xóa thông tin dữ liệu khách hàng
    Route::delete('/{id}/delete', [testController::class,'destroy'])->name('customer.delete');
});

// Route::get('admin',AdminController::class);

Route::get('/khu-vuc-uong-bia/{age?}',function($age = 0){
    echo '<h1>Uong Bia</h1>';
})->middleware('checkage')->name('uong-bia');

Route::get('/khu-vuc-nuoc-ngot/{age?}',function($age = 0){
    echo '<h1>Uong Nuoc ngot</h1>';
})->name('uong-nuoc-ngot');

Route::get('/kiemtra/{age}',function($age=0){
return redirect()->route('customer.index');
})->middleware('checkage');

// Route::get('/kiemtra', function () {
//     return view('kiemtra_email');
// });
Route::post('/checkemail', [UserController::class, 'validationEmail'])->name('checkEmail');