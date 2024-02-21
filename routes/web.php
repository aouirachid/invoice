<?php

use App\Http\Controllers\ClientController;
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

Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

Route::post('/clienst/store',[ClientController::class,'store'])->name('clients.store');

Route::get('/clients',[ClientController::class,'index'])->name('clients.index') ;

Route::put('/clients/{clients}',[ClientController::class,'update'])->name('clients.update');

Route::get('/clients/{clients}/edit',[ClientController::class,'edit'])->name('clients.edit');

Route::get('/clients/{clients}',[ClientController::class,'show'])->name('clients.show');

Route::get('/clients/{clients}',[ClientController::class,'show'])->name('clients.show');