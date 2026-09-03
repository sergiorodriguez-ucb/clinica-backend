<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;

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


// Get all citas
Route::get('/v1/citas', [CitaController::class, 'index']);

// Get a specific cita by ID
Route::get('/v1/citas/{id}', [CitaController::class, 'show']);

// Create a new cita
Route::post('/v1/citas', [CitaController::class, 'store'], 'store');

// Update a cita by ID
Route::put('/v1/citas/{id}', [CitaController::class, 'update']);   

// Delete a cita by ID
Route::delete('/v1/citas/{id}', [CitaController::class, 'destroy']);   

