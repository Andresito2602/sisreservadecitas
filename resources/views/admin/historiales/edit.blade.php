@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Editar historial: {{ $historial->paciente->nombres }} {{ $historial->paciente->apellidos }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Modifique los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/historiales', $historial->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paciente_id">Paciente <b>*</b></label>
                                    <select name="paciente_id" id="paciente_id" class="form-control" required>
                                        <option value="">-- Seleccione un paciente --</option>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}"
                                                {{ $historial->paciente_id == $paciente->id ? 'selected' : '' }}>
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
                                    <label for="fecha_visita">Fecha de la cita médica <b>*</b></label>
                                    <input type="date" id="fecha_visita" name="fecha_visita"
                                           value="{{ old('fecha_visita', $historial->fecha_visita) }}"
                                           class="form-control" required>
                                    @error('fecha_visita')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Solo muestra el select de doctor si el usuario logueado NO es doctor --}}
                        @if(!auth()->user()->doctor)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor_id">Doctor <b>*</b></label>
                                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                                        <option value="">-- Seleccione un doctor --</option>
                                        @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}"
                                                {{ $historial->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->apellidos }}, {{ $doctor->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle">Descripción de la cita <b>*</b></label>
                                    <textarea id="detalle" name="detalle" class="form-control">{{ old('detalle', $historial->detalle) }}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detalle'))
                                            .catch(error => console.error(error));
                                    </script>
                                    @error('detalle')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/historiales') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Actualizar historial
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
