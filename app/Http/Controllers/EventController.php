<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Traits\GeneraPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    use GeneraPDF;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_reserva'  => 'required|date',
            'hora_reserva'   => 'required|date_format:H:i',
            'doctor_id'      => 'required|exists:doctors,id',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        $doctor        = Doctor::findOrFail($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva  = $request->hora_reserva . ':00';

        // Traducir el día usando Carbon (sin array manual)
        $dia_de_reserva = strtoupper(
            Carbon::parse($fecha_reserva)->locale('es')->isoFormat('dddd')
        );

        // Valida si el doctor tiene horario disponible ese día y hora
        $horarioDisponible = Horario::where('doctor_id', $doctor->id)
            ->where('dia', $dia_de_reserva)
            ->where('hora_inicio', '<=', $hora_reserva)
            ->where('hora_fin', '>=', $hora_reserva)
            ->exists();

        if (! $horarioDisponible) {
            return redirect()->back()->with([
                'mensaje'      => 'El doctor no está disponible en ese horario.',
                'icono'        => 'error',
                'hora_reserva' => 'El doctor no está disponible en ese horario.',
            ]);
        }

        $fecha_hora_reserva = $fecha_reserva . ' ' . $hora_reserva;

        // Valida reservas duplicadas
        $eventoDuplicado = Event::where('doctor_id', $doctor->id)
            ->where('start', $fecha_hora_reserva)
            ->exists();

        if ($eventoDuplicado) {
            return redirect()->back()->with([
                'mensaje'      => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
                'icono'        => 'error',
                'hora_reserva' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
            ]);
        }

        Event::create([
            'title'          => $request->hora_reserva . ' ' . $doctor->especialidad,
            'start'          => $fecha_hora_reserva,
            'end'            => $fecha_hora_reserva,
            'color'          => '#e82216',
            'user_id'        => Auth::id(),
            'doctor_id'      => $doctor->id,
            'consultorio_id' => $request->consultorio_id,
        ]);

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se registró la reserva de la cita médica correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()->back()->with([
            'mensaje' => 'Se eliminó la reserva correctamente',
            'icono'   => 'success',
        ]);
    }

    public function reportes()
    {
        return view('admin.reservas.reportes');
    }

    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $eventos       = Event::with('doctor', 'user', 'consultorio')->get();

        $pdf = \PDF::loadView('admin.reservas.pdf', compact('configuracion', 'eventos'));
        $this->agregarPiePagina($pdf);

        return $pdf->stream();
    }

    public function pdf_fechas(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $configuracion = Configuracione::latest()->first();
        $fecha_inicio  = $request->fecha_inicio;
        $fecha_fin     = $request->fecha_fin;

        $eventos = Event::with('doctor', 'user', 'consultorio')
            ->whereBetween('start', [$fecha_inicio, $fecha_fin])
            ->get();

        $pdf = \PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion', 'eventos', 'fecha_inicio', 'fecha_fin'));
        $this->agregarPiePagina($pdf);

        return $pdf->stream();
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }
}
