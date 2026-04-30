<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia', 'hora_inicio', 'hora_fin', 'doctor_id', 'consultorio_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    /**
     * Verifica si existe un horario que se solape con el rango dado
     * para el mismo consultorio y día, excluyendo opcionalmente un ID.
     */
    public static function existeSolapamiento(
        string $dia,
        string $horaInicio,
        string $horaFin,
        int $consultorioId,
        ?int $excludeId = null
    ): bool {
        return static::where('dia', $dia)
            ->where('consultorio_id', $consultorioId)
            ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
            ->where(function ($query) use ($horaInicio, $horaFin) {
                $query->where(function ($q) use ($horaInicio, $horaFin) {
                    // El inicio del nuevo horario cae dentro de uno existente
                    $q->where('hora_inicio', '<=', $horaInicio)
                      ->where('hora_fin', '>', $horaInicio);
                })->orWhere(function ($q) use ($horaInicio, $horaFin) {
                    // El fin del nuevo horario cae dentro de uno existente
                    $q->where('hora_inicio', '<', $horaFin)
                      ->where('hora_fin', '>=', $horaFin);
                })->orWhere(function ($q) use ($horaInicio, $horaFin) {
                    // El nuevo horario envuelve completamente a uno existente
                    $q->where('hora_inicio', '>=', $horaInicio)
                      ->where('hora_fin', '<=', $horaFin);
                });
            })
            ->exists();
    }
}
