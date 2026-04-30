@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Detalle del pago #{{ $pago->id }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del pago</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Paciente</b></label>
                                <p>{{ $pago->paciente->nombres }} {{ $pago->paciente->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Doctor</b></label>
                                <p>{{ $pago->doctor->nombres }} {{ $pago->doctor->apellidos }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Especialidad</b></label>
                                <p>{{ $pago->doctor->especialidad }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Fecha de pago</b></label>
                                <p>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Monto</b></label>
                                <p>{{ number_format($pago->monto, 2) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Descripción</b></label>
                                <p>{{ $pago->descripcion ?? 'ninguno' }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <a href="{{ url('admin/pagos/' . $pago->id . '/edit') }}" class="btn btn-success">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <a href="{{ url('admin/pagos/' . $pago->id . '/pdf') }}" class="btn btn-warning" target="_blank">
                                <i class="bi bi-printer"></i> Imprimir PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
