<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_documento',
        'cc',
        'nro_seguro',
        'fecha_nacimiento',
        'genero',
        'celular',
        'correo',
        'direccion',
        'grupo_sanguineo',
        'alergias',
        'contacto_emergencia',
        'observaciones',
    ];

    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }
}
