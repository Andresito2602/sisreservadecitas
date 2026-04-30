@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Historial: {{ $historial->paciente->nombres }} {{ $historial->paciente->apellidos }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del historial médico</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Paciente</b></label>
                                <p>{{ $historial->paciente->nombres }} {{ $historial->paciente->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Doctor</b></label>
                                <p>{{ $historial->doctor->nombres }} {{ $historial->doctor->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Especialidad</b></label>
                                <p>{{ $historial->doctor->especialidad }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Fecha de la cita</b></label>
                                <p>{{ \Carbon\Carbon::parse($historial->fecha_visita)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Descripción / Detalle</b></label>
                                <div class="p-3 border rounded bg-light">
                                    {!! $historial->detalle !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/historiales') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <a href="{{ url('admin/historiales/' . $historial->id . '/edit') }}" class="btn btn-success">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
