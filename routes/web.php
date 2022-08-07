<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\front\HomePageController;
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
/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/',[HomePageController::class,'index'])->name('front.homepage');
Route::get('/ozgecmis',[HomePageController::class,'resume'])->name('front.resume');
Route::get('/projeler',[HomePageController::class,'project'])->name('front.project');
Route::match(['post','get'],'/iletisim',[HomePageController::class,'contact'])->name('front.contact');
Route::get('/proje/{slug}',[HomePageController::class,'singleProject'])->name('front.singleProject');

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/login',[AuthController::class,'login'])->name('backend.login');
Route::post('/login',[AuthController::class,'loginPost'])->name('backend.registerŞogin');
Route::get('/register',[AuthController::class,'register'])->name('backend.register');
Route::post('/register',[AuthController::class,'registerPost'])->name('backend.registerPost');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.index');
        Route::post('/dashboard',[DashboardController::class,'editUser'])->name('admin.editUser');
        Route::resource('/project',ProjectController::class);
        Route::get('/projectestatus',[ProjectController::class,'status'])->name('admin.project.status');

    Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');

});
