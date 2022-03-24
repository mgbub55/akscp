<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
* Auth Controller
*/
Route::get('/', [AuthController::class,'loginForm'])->name('loginForm');
Route::post('login', [AuthController::class,'login'])->name('login');
Route::post('logout', [AuthController::class,'logout'])->name('logout');



/*
* UserController
*/
Route::get('users',[UserController::class,'index'])->name('users');
Route::get('users/exportexcel', [UserController::class, 'exportExcel'])->name('exportexcel');
Route::post('users/importpdf', [UserController::class, 'importPdf'])->name('importpdf');
Route::get('users/exportpdf', [UserController::class, 'exportPdf'])->name('exportpdf');
Route::any('users/{source}',[UserController::class,'searchGender'])->name('users.search');
Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');
Route::post('/store',[UserController::class,'store'])->name('store');
Route::post('/filter/users/{source}',[UserController::class,'filterUsers'])->name('users.filter');
Route::put('/edit/{id}',[UserController::class,'update'])->name('edit');
Route::delete('/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');

