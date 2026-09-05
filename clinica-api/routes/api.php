<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/v1/login', [LoginController::class, 'authenticate']);


//Route to get all pacientes
Route::get('/v1/pacientes', [PacienteController::class, 'index'])->middleware('auth:sanctum');

// Route to get a specific paciente by ID
Route::get('/v1/pacientes/{id}',[PacienteController::class, 'show'])->middleware('auth:sanctum');

// Route to create a new paciente
Route::post('/v1/pacientes', [PacienteController::class, 'store'])->middleware('auth:sanctum');


//update a paciente by ID
Route::put('/v1/pacientes/{id}', [PacienteController::class, 'update'])->middleware('auth:sanctum');

// Route to delete a paciente by ID
Route::delete('/v1/pacientes/{id}', [PacienteController::class, 'destroy'])->middleware('auth:sanctum');    


// Get all citas
Route::get('/v1/citas', [CitaController::class, 'index'])->middleware('auth:sanctum');

// Get a specific cita by ID
Route::get('/v1/citas/{id}', [CitaController::class, 'show'])->middleware('auth:sanctum');

// Create a new cita
Route::post('/v1/citas', [CitaController::class, 'store'])->middleware('auth:sanctum');

// Update a cita by ID
Route::put('/v1/citas/{id}', [CitaController::class, 'update'])->middleware('auth:sanctum');   

// Delete a cita by ID
Route::delete('/v1/citas/{id}', [CitaController::class, 'destroy'])->middleware('auth:sanctum');   

