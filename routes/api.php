<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AtendimentoController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\UsuarioController;


// listar e cadastrar usuario
// listar e cadastrar medico


// ---------------- usuario ----------------

Route::get('listar/usuario', [UsuarioController::class,'getAllUsuarios']);
Route::get('listar/usuario/{id}', [UsuarioController::class,'getUsuario']);
Route::post('cadastrar/usuario', [UsuarioController::class,'createUsuario']);
Route::put('atualizar/usuario/{id}', [UsuarioController::class,'updateUsuario']);
Route::delete('deletar/usuario/{id}', [UsuarioController::class,'deleteUsuario']);

// ----------------- medico -----------------

Route::get('listar/medico', [MedicoController::class,'getAllMedicos']);
Route::get('listar/medico/{id}', [MedicoController::class,'getMedico']);
Route::post('cadastrar/medico', [MedicoController::class,'createMedico']);
Route::put('atualizar/medico/{id}', [MedicoController::class,'updateMedico']);
Route::delete('deletar/medico/{id}', [MedicoController::class,'deleteMedico']);


// -----med-agenda---




// listar/cadastrar horarios
// agendar os horarios disponiveis
// atender os agendamentos
