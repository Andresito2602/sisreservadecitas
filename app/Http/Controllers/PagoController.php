<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use App\Traits\GeneraPDF;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    use GeneraPDF;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('paciente', 'doctor')->get();
        $total = Pago::sum('monto');
        return view('admin.pagos.index', compact('pagos', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos')->get();
        $doctores  = Doctor::orderBy('apellidos')->get();
        return view('admin.pagos.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id'   => 'required|exists:doctors,id',
            'fecha_pago'  => 'required|date',
            'monto'       => 'required|numeric|min:0',
            'descripcion' => 'nullable|max:255',
        ]);

        Pago::create($request->only(['paciente_id', 'doctor_id', 'fecha_pago', 'monto', 'descripcion']));

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se registró el pago exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = Pago::with('paciente', 'doctor')->findOrFail($id);
        return view('admin.pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pago      = Pago::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos')->get();
        $doctores  = Doctor::orderBy('apellidos')->get();
        return view('admin.pagos.edit', compact('pago', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id'   => 'required|exists:doctors,id',
            'fecha_pago'  => 'required|date',
            'monto'       => 'required|numeric|min:0',
            'descripcion' => 'nullable|max:255',
        ]);

        $pago->update($request->only(['paciente_id', 'doctor_id', 'fecha_pago', 'monto', 'descripcion']));

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se actualizó el pago exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Show confirmation page before deleting.
     */
    public function confirmDelete($id)
    {
        $pago = Pago::with('paciente', 'doctor')->findOrFail($id);
        return view('admin.pagos.delete', compact('pago'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pago::destroy($id);

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se eliminó el pago exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Generate PDF receipt (comprobante) for a payment.
     * Uses endroid/qr-code with GD renderer (no imagick needed).
     */
    public function pdfPago($id)
    {
        $pago          = Pago::with('paciente', 'doctor')->findOrFail($id);
        $configuracion = Configuracione::latest()->first();

        $qrData = implode("\n", [
            'Paciente: ' . $pago->paciente->nombres . ' ' . $pago->paciente->apellidos,
            'CI: ' . $pago->paciente->cc,
            'Doctor: ' . $pago->doctor->nombres . ' ' . $pago->doctor->apellidos,
            'Fecha: ' . $pago->fecha_pago,
            'Monto: ' . number_format($pago->monto, 2),
        ]);

        $qr     = \Endroid\QrCode\QrCode::create($qrData)->setSize(120)->setMargin(4);
        $writer = new \Endroid\QrCode\Writer\PngWriter();
        $result = $writer->write($qr);

        $qrBase64 = base64_encode($result->getString());

        $pdf = \PDF::loadView(
            'admin.pagos.pdf_pago',
            compact('pago', 'configuracion', 'qrBase64')
        );

        $this->agregarPiePagina($pdf);

        return $pdf->stream('comprobante_pago_' . $id . '.pdf');
    }
}
