@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo pago</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/pagos/create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paciente_id">Paciente <b>*</b></label>
                                    <select name="paciente_id" id="paciente_id" class="form-control" required>
                                        <option value="">-- Seleccione un paciente --</option>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                                {{ $paciente->apellidos }}, {{ $paciente->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('paciente_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor_id">Doctor <b>*</b></label>
                                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                                        <option value="">-- Seleccione un doctor --</option>
                                        @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->apellidos }} {{ $doctor->nombres }} - {{ $doctor->especialidad }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_pago">Fecha de pago <b>*</b></label>
                                    <input type="date" id="fecha_pago" name="fecha_pago"
                                           value="{{ old('fecha_pago', date('Y-m-d')) }}"
                                           class="form-control" required>
                                    @error('fecha_pago')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="monto">Monto <b>*</b></label>
                                    <input type="number" id="monto" name="monto" step="0.01" min="0"
                                           value="{{ old('monto') }}"
                                           class="form-control" required>
                                    @error('monto')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion"
                                           value="{{ old('descripcion') }}"
                                           class="form-control" maxlength="255">
                                    @error('descripcion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Registrar nuevo
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
