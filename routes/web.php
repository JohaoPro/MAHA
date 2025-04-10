<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () { return view('welcome'); });

Route::get('/mesas', [MesaController::class,'index'])->name('mesas.index');
Route::get('/categorias', [CategoriaController::class,'index'])->name('categorias.index');
Route::get('/categorias/{idCategoria}/platillos',[PlatilloController::class,'index'])->name('platillos.index');
Route::get('/platillos', [PLatilloController::class,'index'])->name('platillos.index');

Route::get('/informacion',[UserController::class,'index'])->name('informacion.index');

//Route::get('/register',function(){return view('auth.register');});
Route::get('/register',[RegisterController::class,'show']);
Route::post('/register',[RegisterController::class,'register'])->name('registro.index');


Route::get('/login',[LoginController::class,'show']);
Route::post('/login',[LoginController::class,'login'])->name('login.index');
Route::post('/mesas', [MesaController::class,'index'])->name('mesas.index');






