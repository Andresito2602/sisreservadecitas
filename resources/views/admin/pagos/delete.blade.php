@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar pago #{{ $pago->id }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este pago?</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Atención:</strong> Esta acción es irreversible. Se eliminará permanentemente el registro del pago.
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Paciente</b></label>
                                <p>{{ $pago->paciente->nombres }} {{ $pago->paciente->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Doctor</b></label>
                                <p>{{ $pago->doctor->nombres }} {{ $pago->doctor->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Fecha de pago</b></label>
                                <p>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Monto</b></label>
                                <p>{{ number_format($pago->monto, 2) }}</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><b>Descripción</b></label>
                                <p>{{ $pago->descripcion ?? 'ninguno' }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <form action="{{ url('/admin/pagos/' . $pago->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Eliminar pago
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
