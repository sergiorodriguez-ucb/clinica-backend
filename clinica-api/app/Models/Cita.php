<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['paciente_id', 'medico_id','fecha_cita', 'hora_cita', 'estado', 'motivo', 'observaciones'];
}
