<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/login',[Login::class,'login'])->name('login');
Route::post('/login',[Login::class,'loginSubmit'])->name('login.submit');
Route::get('/user/dashboard',[Login::class,'dashboard'])->name('user.dash')->middleware('logged');
Route::get('/admin/dashboard',[Login::class,'dashboard'])->name('admin.dash')->middleware('logged');
Route::get('/logout',[Login::class,'logout'])->name('logout');

Route::get('admin/dashboard/show',[AdminController::class,'show'])->name('admin.dash.show')->middleware('logged');
Route::get('admin/dashboard/show/{id}',[AdminController::class,'showIndividual'])->name('admin.dash.show.individual')->middleware('logged');
Route::get('admin/dashboard/delete/{id}',[AdminController::class,'delete'])->name('admin.dash.delete')->middleware('logged');
Route::get('admin/dashboard/update/{id}',[AdminController::class,'update'])->name('admin.dash.update')->middleware('logged');
Route::post('admin/dashboard/update/{id}',[AdminController::class,'updateSubmit'])->name('admin.dash.update.submit')->middleware('logged');


Route::get('/user/register',[RegistrationController::class,'register'])->name('register');
Route::post('/user/register',[RegistrationController::class,'registerSubmit'])->name('register.submit');
