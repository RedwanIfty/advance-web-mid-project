<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\Login;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PharmacyController;
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
Route::get('/',[Welcome::class,'welcome'])->name('welcome');
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
Route::get('admin/dashboard/search',[AdminController::class,'search'])->name('admin.dash.search')->middleware('logged');
Route::post('admin/dashboard/search',[AdminController::class,'searchSubmit'])->name('admin.dash.search.submit')->middleware('logged');
Route::get('admin/dashboard/download',[AdminController::class,'download'])->name('admin.dash.download')->middleware('logged');
Route::get('drugs/download',[AdminController::class,'downloaddrugs'])->name('drugs.download')->middleware('logged');//download pdf

Route::get('admin/dashboard/changeProfilePic',[AdminController::class,'changeProfilePic'])->name('admin.dash.changeProfilePic')->middleware('logged');
Route::post('admin/dashboard/changeProfilePic',[AdminController::class,'changeProfilePicSubmit'])->name('admin.dash.changeProfilePic.submit')->middleware('logged');


Route::get('/user/register',[RegistrationController::class,'register'])->name('register');
Route::post('/user/register',[RegistrationController::class,'registerSubmit'])->name('register.submit');

Route::get('add/drugs',[AdminController::class,'drugs'])->name('drugs')->middleware('logged');
Route::post('add/drugs',[AdminController::class,'drugsSubmit'])->name('drugs.submit')->middleware('logged');

Route::get('show/drugs',[AdminController::class,'drugsShow'])->name('drugs.show')->middleware('logged');  

Route::get('drugs/add/{id}',[AdminController::class,'drugsAdd'])->name('drugs.add')->middleware('logged');
Route::post('drugs/add/{id}',[AdminController::class,'drugsAddSubmit'])->name('drugs.add.submit')->middleware('logged');

Route::get('drugs/delete/{id}',[AdminController::class,'drugsDelete'])->name('drugs.delete')->middleware('logged');

Route::get('drugs/search',[AdminController::class,'searchDrugs'])->name('drugs.search')->middleware('logged');
Route::post('drugs/search',[AdminController::class,'searchDrugsSubmit'])->name('drugs.search.submit')->middleware('logged');

Route::get('forget/password',[AdminController::class,'forgetPass'])->name('forget.pass');
Route::post('forget/password',[AdminController::class,'forgetPassSubmit'])->name('forget.pass.submit');

Route::get('show/pharmacy',[PharmacyController::class,'pharmacy'])->name('show.pharmacy')->middleware('logged');
Route::get('add/pharmacy',[PharmacyController::class,'pharmacyAdd'])->name('add.pharmacy')->middleware('logged');
Route::post('add/pharmacy',[PharmacyController::class,'pharmacyAddSubmit'])->name('add.submit.pharmacy')->middleware('logged');

Route::get('pharmacy/search',[PharmacyController::class,'search'])->name('search.pharmacy')->middleware('logged');
Route::post('pharmacy/search',[PharmacyController::class,'searchSubmit'])->name('search.pharmacy.submit')->middleware('logged');
Route::get('pharmacy/delete/{id}',[PharmacyController::class,'delete'])->name('delete.pharmacy')->middleware('logged');

Route::get('pharmacy/update/{id}',[PharmacyController::class,'update'])->name('update.pharmacy')->middleware('logged');
Route::post('pharmacy/update/{id}',[PharmacyController::class,'updateSubmit'])->name('update.submit.pharmacy')->middleware('logged');
