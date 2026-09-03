<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use App\Http\Controllers\PacienteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route to get all pacientes
Route::get('/v1/pacientes', [PacienteController::class, 'index']);

// Route to get a specific paciente by ID
Route::get('/v1/pacientes/{id}',[PacienteController::class, 'show']);

// Route to create a new paciente
Route::post('/v1/pacientes', [PacienteController::class, 'store']);


//update a paciente by ID
Route::put('/v1/pacientes/{id}', [PacienteController::class, 'update']);

// Route to delete a paciente by ID
Route::delete('/v1/pacientes/{id}', [PacienteController::class, 'destroy']);    