<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Paciente::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'genero' => 'required|in:masculino,femenino,otro',
        'telefono' => 'required|string|max:20',
        'email' => 'required|email|unique:pacientes,email',
        'tipo_sangre' => 'required|string|max:10',
        'alergia' => 'nullable|string|max:255',
        ]);

        $paciente = Paciente::create($validatedData);
        return response()->json($paciente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            return response()->json($paciente);
        } else {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'fecha_nacimiento' => 'sometimes|required|date',
            'genero' => 'sometimes|required|in:masculino,femenino,otro',
            'telefono' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:pacientes,email,' . $id,
            'tipo_sangre' => 'sometimes|required|string|max:10',
            'alergia' => 'nullable|string|max:255',
        ]);

        $paciente->update($validatedData);
        return response()->json($paciente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
        else {
            $paciente->delete();
            return response()->json(['message' => 'Paciente eliminado correctamente']);
        }
    }
}
