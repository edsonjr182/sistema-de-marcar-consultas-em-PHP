<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;

/**
 * Configuração das rotas web da aplicação.
 *
 * Este arquivo é responsável por definir todas as rotas web do sistema.
 * Ele inclui rotas para autenticação, dashboard, e CRUDs para várias entidades como especialidades, médicos, pacientes e consultas.
 */

// Rota inicial que redireciona para a página home, controlada pelo HomeController.
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// Rota para o dashboard que requer autenticação.
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Inclui as rotas de autenticação padrão do Laravel.
require __DIR__.'/auth.php';

// Grupo de rotas que requer autenticação.
Route::middleware(['auth'])->group(function () {
    // Rotas CRUD para especialidades médicas.
    Route::resource('especialidades', EspecialidadeController::class);
    // Rotas CRUD para médicos.
    Route::resource('medicos', MedicoController::class);
    // Rotas CRUD para pacientes.
    Route::resource('pacientes', PacienteController::class);
    // Rotas CRUD para consultas.
    Route::resource('consultas', ConsultaController::class);
});
