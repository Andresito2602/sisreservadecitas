@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Horario: {{$horario->doctor->nombres." ".$horario->doctor->apellidos." ".$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion." ".$horario->dia." ".$horario->hora_inicio." - ".$horario->hora_fin}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este horario?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/horarios',$horario->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Doctores</label>
                                <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Consultorios</label>
                                <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Día</label>
                                <p>{{$horario->dia}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora Inicio</label>
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora Final</label>
                                <p>{{$horario->hora_fin}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary"> Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar horario</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
