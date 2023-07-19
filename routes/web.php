<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\studuntcontroller;
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

Route::get('register',[authcontroller::class,'registerView'])->name('registerView');
Route::post('register',[authcontroller::class,'register'])->name('register');

Route::get('login',[authcontroller::class,'loginView'])->name('loginview');
Route::post('login',[authcontroller::class,'login'])->name('login');

Route::get('studunt-register',[studuntcontroller::class,'studuntRegisterview'])->name('studuntregisterView');
Route::post('studunt-register',[studuntcontroller::class,'studuntRegister'])->name('studuntregister');


Route::get('studuntData',[studuntcontroller::class,'studuntData'])->name('studuntData');

Route::get('editdata/{id}',[studuntcontroller::class,'editData'])->name('editdata');
Route::post('update-data',[studuntcontroller::class,'updateData'])->name('updatedata');

Route::get('deletedata/{id}',[studuntcontroller::class,'deleteData'])->name('deletedata');


