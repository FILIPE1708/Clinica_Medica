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
Route::get('/', function (){
    return redirect()->route('login');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logar', [\App\Http\Controllers\LoginController::class, 'logar'])->name('logar');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

#Rotas usuario
Route::prefix('usuario')->middleware(['login'])->group(function (){
    Route::get('/novo', [\App\Http\Controllers\UsuarioController::class, 'novo'])->name('usuario.novo');
    Route::post('/cadastrar', [\App\Http\Controllers\UsuarioController::class, 'cadastrar'])->name('usuario.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\UsuarioController::class, 'editar'])->name('usuario.editar');
    Route::post('/alterar', [\App\Http\Controllers\UsuarioController::class, 'alterar'])->name('usuario.alterar');
    Route::get('/exluir/{id}', [\App\Http\Controllers\UsuarioController::class, 'excluir'])->name('usuario.excluir');
});

#Inicio da página
Route::get('/inicio', function (){
   return view('inicio');
})->middleware(['login'])->name('inicio');

#Rotas recepcionista
Route::prefix('recepcionista')->middleware(['login'])->group(function () {
    Route::get('/novo', [\App\Http\Controllers\RecepcionistaController::class, 'novo'])->name('recepcionista.novo');
    Route::get('/listar', [\App\Http\Controllers\RecepcionistaController::class, 'listar'])->name('recepcionista.listar');
    Route::post('/cadastrar', [\App\Http\Controllers\RecepcionistaController::class, 'cadastrar'])->name('recepcionista.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\RecepcionistaController::class, 'editar'])->name('recepcionista.editar');
    Route::post('/alterar', [\App\Http\Controllers\RecepcionistaController::class, 'alterar'])->name('recepcionista.alterar');
    Route::get('/excluir/{id}', [\App\Http\Controllers\RecepcionistaController::class, 'excluir'])->name('recepcionista.excluir');
});

#Rotas medico
Route::prefix('medico')->middleware(['login'])->group(function () {
    Route::get('/novo', [\App\Http\Controllers\MedicoController::class, 'novo'])->name('medico.novo');
    Route::get('/listar', [\App\Http\Controllers\MedicoController::class, 'listar'])->name('medico.listar');
    Route::post('/cadastrar', [\App\Http\Controllers\MedicoController::class, 'cadastrar'])->name('medico.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\MedicoController::class, 'editar'])->name('medico.editar');
    Route::post('/alterar', [\App\Http\Controllers\MedicoController::class, 'alterar'])->name('medico.alterar');
    Route::get('/excluir/{id}', [\App\Http\Controllers\MedicoController::class, 'excluir'])->name('medico.excluir');
});

#Rotas enfermeiro
Route::prefix('enfermeiro')->middleware(['login'])->group(function (){
    Route::get('/novo', [\App\Http\Controllers\EnfermeiroController::class, 'novo'])->name('enfermeiro.novo');
    Route::get('/listar', [\App\Http\Controllers\EnfermeiroController::class, 'listar'])->name('enfermeiro.listar');
    Route::post('/cadastrar', [\App\Http\Controllers\EnfermeiroController::class, 'cadastrar'])->name('enfermeiro.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\EnfermeiroController::class, 'editar'])->name('enfermeiro.editar');
    Route::post('/alterar', [\App\Http\Controllers\EnfermeiroController::class, 'alterar'])->name('enfermeiro.alterar');
    Route::get('/excluir/{id}', [\App\Http\Controllers\EnfermeiroController::class, 'excluir'])->name('enfermeiro.excluir');
});

#Rotas paciente
Route::prefix('paciente')->middleware(['login'])->group(function (){
    Route::get('/novo', [\App\Http\Controllers\PacienteController::class, 'novo'])->name('paciente.novo');
    Route::get('/listar', [\App\Http\Controllers\PacienteController::class, 'listar'])->name('paciente.listar');
    Route::post('/cadastrar', [\App\Http\Controllers\PacienteController::class, 'cadastrar'])->name('paciente.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\PacienteController::class, 'editar'])->name('paciente.editar');
    Route::post('/alterar', [\App\Http\Controllers\PacienteController::class, 'alterar'])->name('paciente.alterar');
    Route::get('/excluir/{id}', [\App\Http\Controllers\PacienteController::class, 'excluir'])->name('paciente.excluir');
});

#Rotas consulta
Route::prefix('consulta')->middleware(['login'])->group(function () {
    Route::get('/novo', [\App\Http\Controllers\ConsultaController::class, 'novo'])->name('consulta.novo');
    Route::post('/cadastrar', [\App\Http\Controllers\ConsultaController::class, 'cadastrar'])->name('consulta.cadastrar');
    Route::get('/editar/{id}', [\App\Http\Controllers\ConsultaController::class, 'editar'])->name('consulta.editar');
    Route::post('/alterar',[\App\Http\Controllers\ConsultaController::class, 'alterar'])->name('consulta.alterar');
    Route::get('/realizar/{id}', [\App\Http\Controllers\ConsultaController::class, 'realizar'])->name('consulta.realizar');
    Route::post('/finalizar', [\App\Http\Controllers\ConsultaController::class, 'finalizar'])->name('consulta.finalizar');
    Route::get('/excluir/{id}', [\App\Http\Controllers\ConsultaController::class, 'excluir'])->name('consulta.excluir');
    Route::get('detalhes/{id}', [\App\Http\Controllers\ConsultaController::class, 'detalhes'])->name('consulta.detalhes');
});
