<?php

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

#Rotas login
Route::get('/', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logar', [\App\Http\Controllers\LoginController::class, 'logar'])->name('logar');

#Inicio da página
Route::get('/inicio', function (){
   return view('inicio');
})->name('inicio');

#Rotas recepcionista
Route::prefix('recepcionista')->group(function () {
    Route::get('/novo', [\App\Http\Controllers\RecepcionistaController::class, 'novo'])->name('recepcionista.novo');
    Route::get('/listar', [\App\Http\Controllers\RecepcionistaController::class, 'listar'])->name('recepcionista.listar');
});

#Rotas medico
Route::prefix('medico')->group(function () {
    Route::get('/novo', [\App\Http\Controllers\MedicoController::class, 'novo'])->name('medico.novo');
    Route::get('/listar', [\App\Http\Controllers\MedicoController::class, 'listar'])->name('medico.listar');
});

#Rotas consulta
Route::prefix('consulta')->group(function () {
    Route::get('/novo', [\App\Http\Controllers\ConsultaController::class, 'novo'])->name('consulta.novo');
});
