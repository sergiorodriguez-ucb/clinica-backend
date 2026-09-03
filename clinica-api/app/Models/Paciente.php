<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'genero', 'telefono','email', 'tipo_sangre', 'alergia'];
}
