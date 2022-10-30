<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;



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

Route::resource('admin/users/login', LoginController::class)->only('index');
Route::resource('admin/users/login/store', LoginController::class)->only('store');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('admin')->group(function () {

            Route::get('/', [MainController::class, 'index'])->name('admin');
            Route::get('main', [MainController::class, 'index']);

            Route::prefix('users')->group(function () {
                Route::get('add', [UserController::class, 'create']);
                Route::post('add', [UserController::class, 'store']);
                Route::get('list', [UserController::class, 'index']);
                Route::get('edit/{category}', [UserController::class, 'show']);
                Route::post('edit/{category}', [UserController::class, 'update']);
                Route::DELETE('destroy', [UserController::class, 'destroy']);
            });
    
    
            Route::prefix('categories')->group(function () {
                Route::get('add', [CategoryController::class, 'create']);
                Route::post('add', [CategoryController::class, 'store']);
                Route::get('list', [CategoryController::class, 'index']);
                Route::get('edit/{category}', [CategoryController::class, 'show']);
                Route::post('edit/{category}', [CategoryController::class, 'update']);
                Route::DELETE('destroy', [CategoryController::class, 'destroy']);
            });
    
            Route::prefix('products')->group(function () {
                Route::get('add', [ProductController::class, 'create']);
                Route::post('add', [ProductController::class, 'store']);
                Route::get('list', [ProductController::class, 'index']);
                Route::get('edit/{product}', [ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::DELETE('destroy', [ProductController::class, 'destroy']);
            });
    
            Route::prefix('banners')->group(function () {
                Route::get('add', [BannerController::class, 'create']);
                Route::post('add', [BannerController::class, 'store']);
                Route::get('list', [BannerController::class, 'index']);
                Route::get('edit/{banner}', [BannerController::class, 'show']);
                Route::post('edit/{banner}', [BannerController::class, 'update']);
                Route::DELETE('destroy', [BannerController::class, 'destroy']);
            });
    
            Route::post('upload/services', [UploadController::class, 'store']);
        });
    });


});

    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
    Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
    
    Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);






