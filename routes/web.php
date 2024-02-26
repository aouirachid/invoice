<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
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
//                         clients routes 
Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

Route::post('/clienst/store',[ClientController::class,'store'])->name('clients.store');

Route::get('/clients',[ClientController::class,'index'])->name('clients.index') ;

Route::put('/clients/{clients}',[ClientController::class,'update'])->name('clients.update');

Route::get('/clients/{clients}/edit',[ClientController::class,'edit'])->name('clients.edit');

Route::get('/clients/{clients}',[ClientController::class,'show'])->name('clients.show');

//                         services routes 
Route::get('/services/create',[ServiceController::class,'create'])->name('services.create');

Route::post('/services/store',[ServiceController::class,'store'])->name('services.store');

Route::get('/services',[ServiceController::class,'index'])->name('services.index') ;

Route::put('/services/{services}',[ServiceController::class,'update'])->name('services.update');

Route::get('/services/{services}/edit',[ServiceController::class,'edit'])->name('services.edit');

Route::get('/services/{services}',[ServiceController::class,'show'])->name('services.show');

Route::delete('/services/{services}',[ServiceController::class,'destroy'])->name('services.destroy');