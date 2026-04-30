@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo historial</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>

                </div>
                <div class="card-body">
                    <form action="{{url('/admin/historiales/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Pacientes</label> <b>*</b>
                                    <select name="paciente_id" class="form-control">
                                        @foreach($pacientes as $paciente)
                                            <option value="{{$paciente->id}}">{{$paciente->nombres." ".$paciente->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de la cita medica</label> <b>*</b>
                                    <input type="date" value="{{old('fecha_visita')}}" name="fecha_visita" class="form-control" required>
                                    @error('fecha_visita')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Solo muestra el select de doctor si el usuario logueado NO es doctor --}}
                        @if(!auth()->user()->doctor)
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Doctor</label> <b>*</b>
                                    <select name="doctor_id" class="form-control" required>
                                        <option value="">-- Seleccione un doctor --</option>
                                        @foreach($doctores as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripción de la cita</label>
                                    <textarea id="detalle" name="detalle" class="form-control">{{old('detalle')}}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detalle'))
                                            .catch(error => console.error(error));
                                    </script>
                                    @error('detalle')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/historiales')}}" class="btn btn-secondary"> Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar nuevo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
