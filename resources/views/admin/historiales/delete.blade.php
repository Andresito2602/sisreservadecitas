@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar historial: {{ $historial->paciente->nombres }} {{ $historial->paciente->apellidos }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este historial médico?</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Atención:</strong> Esta acción es irreversible. Se eliminará permanentemente el registro médico.
                    </div>

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
                                <label><b>Fecha de la cita</b></label>
                                <p>{{ \Carbon\Carbon::parse($historial->fecha_visita)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Detalle</b></label>
                                <div class="p-3 border rounded bg-light">
                                    {!! $historial->detalle !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <form action="{{ url('/admin/historiales', $historial->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('admin/historiales') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Eliminar historial
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
