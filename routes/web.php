<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\ContactPageController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ResumeController;
use App\Http\Controllers\backend\UserController;
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

Route::get('site-bakimda',function (){
    return view('front.offline');
});
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
Route::prefix('admin')->middleware('auth')->group(function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->middleware('role:Admin|yazar')->name('admin.index');
        Route::post('/dashboard',[DashboardController::class,'editUser'])->middleware('role:Admin|yazar')->name('admin.editUser');
        Route::resource('/project',ProjectController::class)->middleware('role:Admin|yazar');
        Route::get('/projectestatus',[ProjectController::class,'status'])->name('admin.project.status');
        Route::resource('/resume',ResumeController::class)->middleware('role:Admin|yazar');
        Route::get('/resumetestatus',[ResumeController::class,'status'])->name('admin.resume.status');
        Route::get('/contact',[ContactPageController::class,'index'])->name('admin.contact')->middleware('role:Admin');
        Route::post('/contact',[ContactPageController::class,'editContact'])->name('admin.editContact');
        Route::resource('/kullanici',UserController::class)->middleware('role:Admin');
        Route::get('/usertestatus',[UserController::class,'status'])->name('admin.user.status');
        Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
        Route::get('/config',[ConfigController::class,'index'])->middleware('role:Admin')->name('admin.config.index');
        Route::post('/config/update',[ConfigController::class,'update'])->middleware('role:Admin')->name('admin.config.update');


});
