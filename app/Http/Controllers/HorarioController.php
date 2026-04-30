<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.index', compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create', compact('doctores','consultorios','horarios'));
    }

    public function cargar_datos_consultorios($id){
        try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
        }catch (\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        if (Horario::existeSolapamiento(
            $request->dia,
            $request->hora_inicio,
            $request->hora_fin,
            $request->consultorio_id
        )) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este consultorio')
                ->with('icono', 'error');
        }

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'El horario se ha creado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.edit', compact('horario','consultorios','doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        if (Horario::existeSolapamiento(
            $request->dia,
            $request->hora_inicio,
            $request->hora_fin,
            $request->consultorio_id,
            $id
        )) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este consultorio')
                ->with('icono', 'error');
        }

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'El horario se ha actualizado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id){
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.delete', compact('horario'));
    }
    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje','Se elimino el horario exitosamente')
            ->with('icono','success');
    }
}
