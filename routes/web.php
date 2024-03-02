<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StateContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name( 'home' );

/*
|--------------------------------------------------------------------------
| Clients Web Routes
|--------------------------------------------------------------------------
|
| Here is where you're clients register web routes for your application.
|
*/
Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

Route::post('/clienst/store',[ClientController::class,'store'])->name('clients.store');

Route::get('/clients',[ClientController::class,'index'])->name('clients.index') ;

Route::put('/clients/{clients}',[ClientController::class,'update'])->name('clients.update');

Route::get('/clients/{clients}/edit',[ClientController::class,'edit'])->name('clients.edit');

Route::get('/clients/{clients}',[ClientController::class,'show'])->name('clients.show');

/*
|--------------------------------------------------------------------------
| Services Web Routes
|--------------------------------------------------------------------------
|
| Here is where you're Services register web routes for your application.
|
*/Route::get('/services/create',[ServiceController::class,'create'])->name('services.create');

Route::post('/services/store',[ServiceController::class,'store'])->name('services.store');

Route::get('/services',[ServiceController::class,'index'])->name('services.index') ;

Route::put('/services/{services}',[ServiceController::class,'update'])->name('services.update');

Route::get('/services/{services}/edit',[ServiceController::class,'edit'])->name('services.edit');

Route::get('/services/{services}',[ServiceController::class,'show'])->name('services.show');

Route::delete('/services/{services}',[ServiceController::class,'destroy'])->name('services.destroy');

/*
|--------------------------------------------------------------------------
| Cities Web Routes
|--------------------------------------------------------------------------
|
| Here is where you're Cities register web routes for your application.
|
*/
Route::get('/cities/create',[CityController::class,'create'])->name('cities.create');

Route::post('/cities/store',[CityController::class,'store'])->name('cities.store');

Route::get('/cities/import',[CityController::class,'importForm'])->name('cities.import.form');

Route::post('/cities/import', [CityController::class, 'import'])->name('cities.import');

Route::get('/cities',[CityController::class,'index'])->name('cities.index') ;

Route::put('/cities/{cities}',[CityController::class,'update'])->name('cities.update');

Route::get('/cities/{cities}/edit',[CityController::class,'edit'])->name('cities.edit');

Route::get('/cities/{cities}',[CityController::class,'show'])->name('cities.show');

Route::delete('/cities/{cities}',[CityController::class,'destroy'])->name('cities.destroy');

/*
|--------------------------------------------------------------------------
| States Web Routes
|--------------------------------------------------------------------------
|
| Here is where you're States register web routes for your application.
|
*/
Route::get('/states/create',[StateContoller::class,'create'])->name('states.create');

Route::post('/states/store',[StateContoller::class,'store'])->name('states.store');

Route::get('/states/import',[StateContoller::class,'importForm'])->name('states.import.form');

Route::post('/states/import', [StateContoller::class, 'import'])->name('states.import');

Route::get('/states',[StateContoller::class,'index'])->name('states.index') ;

Route::put('/states/{states}',[StateContoller::class,'update'])->name('states.update');

Route::get('/states/{states}/edit',[StateContoller::class,'edit'])->name('states.edit');

Route::get('/states/{states}',[StateContoller::class,'show'])->name('states.show');

Route::delete('/states/{states}',[StateContoller::class,'destroy'])->name('states.destroy');