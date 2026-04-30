<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Historial;
use App\Models\Paciente;
use App\Traits\GeneraPDF;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    use GeneraPDF;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historials = Historial::with('paciente', 'doctor')->get();
        return view('admin.historiales.index', compact('historials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos')->get();
        $doctores  = Doctor::orderBy('apellidos')->get();
        return view('admin.historiales.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id'  => 'required|exists:pacientes,id',
            'fecha_visita' => 'required|date',
            'detalle'      => 'required',
        ]);

        // Si el usuario logueado es doctor, se asigna automáticamente.
        // Si es admin u otro rol, debe seleccionar el doctor desde el formulario.
        $doctor    = auth()->user()->doctor;
        $doctor_id = $doctor ? $doctor->id : $request->doctor_id;

        Historial::create([
            'paciente_id'  => $request->paciente_id,
            'doctor_id'    => $doctor_id,
            'detalle'      => $request->detalle,
            'fecha_visita' => $request->fecha_visita,
        ]);

        return redirect()->route('admin.historiales.index')
            ->with('mensaje', 'Se registró el historial médico exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial::with('paciente', 'doctor')->findOrFail($id);
        return view('admin.historiales.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historial = Historial::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos')->get();
        $doctores  = Doctor::orderBy('apellidos')->get();
        return view('admin.historiales.edit', compact('historial', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $historial = Historial::findOrFail($id);

        $request->validate([
            'paciente_id'  => 'required|exists:pacientes,id',
            'fecha_visita' => 'required|date',
            'detalle'      => 'required',
        ]);

        $doctor    = auth()->user()->doctor;
        $doctor_id = $doctor ? $doctor->id : $request->doctor_id;

        $historial->update([
            'paciente_id'  => $request->paciente_id,
            'doctor_id'    => $doctor_id,
            'detalle'      => $request->detalle,
            'fecha_visita' => $request->fecha_visita,
        ]);

        return redirect()->route('admin.historiales.index')
            ->with('mensaje', 'Se actualizó el historial médico exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Show confirmation page before deleting.
     */
    public function confirmDelete($id)
    {
        $historial = Historial::with('paciente', 'doctor')->findOrFail($id);
        return view('admin.historiales.delete', compact('historial'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Historial::destroy($id);

        return redirect()->route('admin.historiales.index')
            ->with('mensaje', 'Se eliminó el historial médico exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Genera el PDF del historial clínico individual (una visita).
     */
    public function pdfHistorial($id)
    {
        $historial     = Historial::with('paciente', 'doctor')->findOrFail($id);
        $configuracion = Configuracione::latest()->first();

        $pdf = \PDF::loadView(
            'admin.historiales.pdf_historial',
            compact('historial', 'configuracion')
        );

        $this->agregarPiePagina($pdf);

        $nombreArchivo = 'historial_' . $historial->paciente->cc . '_' . $historial->fecha_visita . '.pdf';

        return $pdf->stream($nombreArchivo);
    }

    /**
     * Muestra la vista de búsqueda de paciente por carnet de identidad.
     */
    public function buscarPaciente(Request $request)
    {
        $paciente    = null;
        $historiales = collect();

        if ($request->filled('ci')) {
            $paciente = Paciente::where('cc', $request->ci)->first();

            if ($paciente) {
                $historiales = Historial::with('doctor')
                    ->where('paciente_id', $paciente->id)
                    ->orderBy('fecha_visita', 'desc')
                    ->get();
            }
        }

        return view('admin.historiales.buscar_paciente', compact('paciente', 'historiales'));
    }

    /**
     * Genera el PDF con todos los diagnósticos de un paciente.
     */
    public function pdfPaciente($pacienteId)
    {
        $paciente      = Paciente::findOrFail($pacienteId);
        $historiales   = Historial::with('doctor')
            ->where('paciente_id', $pacienteId)
            ->orderBy('fecha_visita', 'asc')
            ->get();
        $configuracion = Configuracione::latest()->first();

        $pdf = \PDF::loadView(
            'admin.historiales.pdf_paciente',
            compact('paciente', 'historiales', 'configuracion')
        );

        $this->agregarPiePagina($pdf);

        $nombreArchivo = 'historial_completo_' . $paciente->cc . '.pdf';

        return $pdf->stream($nombreArchivo);
    }
}
