@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Búsqueda de pacientes:</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Buscar al paciente</h3>
                </div>
                <div class="card-body">

                    {{-- Formulario de búsqueda --}}
                    <form action="{{ url('admin/historial/buscar-paciente') }}" method="GET">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ci"><b>Carnet de identidad:</b></label>
                                    <input type="text" id="ci" name="ci"
                                           value="{{ request('ci') }}"
                                           class="form-control" placeholder="Ej: 12345678">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr>

                    {{-- Resultado de la búsqueda --}}
                    @if(isset($paciente))

                        {{-- Paciente encontrado --}}
                        <h5><b>Información del paciente</b></h5>
                        <table style="font-size: 10pt; margin-top: 8px;">
                            <tr>
                                <td style="font-weight: bold; width: 180px;">Paciente:</td>
                                <td>{{ $paciente->nombres . ' ' . $paciente->apellidos }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Carnet de identidad:</td>
                                <td>{{ $paciente->cc }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Nro de seguro:</td>
                                <td>{{ $paciente->nro_seguro }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Fecha de nacimiento:</td>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                            </tr>
                        </table>

                        <br>

                        @if($historiales->count() > 0)
                            <a href="{{ url('admin/historial/pdf-paciente/' . $paciente->id) }}"
                               class="btn btn-warning" target="_blank">
                                <i class="bi bi-printer"></i> Imprimir historial médico del paciente
                            </a>

                            <br><br>

                            {{-- Tabla de historiales del paciente --}}
                            <table id="tablaHistoriales" class="table table-striped table-bordered table-hover table-sm">
                                <thead style="background-color: #c0c0c0">
                                <tr>
                                    <td style="text-align: center"><b>Nro</b></td>
                                    <td style="text-align: center"><b>Doctor</b></td>
                                    <td style="text-align: center"><b>Fecha de la cita</b></td>
                                    <td style="text-align: center"><b>Detalle</b></td>
                                    <td style="text-align: center"><b>Acciones</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $contador = 1; ?>
                                @foreach($historiales as $historial)
                                    <tr>
                                        <td style="text-align: center">{{ $contador++ }}</td>
                                        <td>{{ $historial->doctor->nombres . ' ' . $historial->doctor->apellidos }}</td>
                                        <td style="text-align: center">{{ $historial->fecha_visita }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit(strip_tags($historial->detalle), 60) !!}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('admin/historiales/' . $historial->id) }}"
                                                   class="btn btn-info btn-sm" title="Ver">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ url('admin/historiales/' . $historial->id . '/edit') }}"
                                                   class="btn btn-success btn-sm" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                @can('admin.historiales.pdf')
                                                <a href="{{ url('admin/historiales/' . $historial->id . '/pdf') }}"
                                                   class="btn btn-warning btn-sm" title="Imprimir PDF" target="_blank">
                                                    <i class="bi bi-printer"></i>
                                                </a>
                                                @endcan
                                                <a href="{{ url('admin/historiales/' . $historial->id . '/confirm-delete') }}"
                                                   class="btn btn-danger btn-sm" title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(function () {
                                    $("#tablaHistoriales").DataTable({
                                        "pageLength": 10,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                                            "search": "Buscador:",
                                            "zeroRecords": "Sin resultados encontrados",
                                            "paginate": {
                                                "first": "Primero",
                                                "last": "Último",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }
                                        },
                                        "responsive": true,
                                        "lengthChange": false,
                                        "autoWidth": false,
                                    });
                                });
                            </script>

                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                Este paciente no tiene historiales médicos registrados.
                            </div>
                        @endif

                    @elseif(request()->has('ci') && request('ci') != '')
                        {{-- Se buscó pero no se encontró --}}
                        <p class="text-muted">Paciente no registrado</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
