<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Prophecy\Call\Call;
use Illuminate\Support\Facades\App;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;

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

// Route::get('/category/index',[HomeController::class,'index'])->name('category.index');
// Route::get('/category/create',[HomeController::class,'create'])->name('category.create');
// Route::post('/category/store',[HomeController::class,'store'])->name('category.store');

Route::resource('categories',CategoryController::class);
Route::delete('/delete',[CategoryController::class,'destroy'])->name('category.destroy');





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Permissions
    Route::delete('permissions/massDestroy', [PermissionController::class, 'massDestroy']);
    Route::resource('permissions', PermissionController::class);

    //Roles
    Route::delete('roles/massDestroy', [RoleController::class, 'massDestroy']);
    Route::resource('roles', RoleController::class);

    //Users 
    Route::delete('users/massDestroy', [UserController::class, 'massDestroy']);
    Route::resource('users', UserController::class);
});

Route::get('/testlang',function(){
   
    App::setlocale(session()->get('cr_lang'));
    echo __('message.hello');
});

Route::get('/changeLang/{lang}',function($lang){
    session(['cr_lang'=>$lang]);
    return redirect('/testlang');
});