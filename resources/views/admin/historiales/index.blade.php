@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de historiales</h1>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historiales Registrados</h3>

                    <div class="card-tools">
                        <a href="{{ url('admin/historiales/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Registrar nuevo
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align: center"><b>Nro</b></td>
                            <td style="text-align: center"><b>Paciente</b></td>
                            <td style="text-align: center"><b>Doctor</b></td>
                            <td style="text-align: center"><b>Fecha de la cita</b></td>
                            <td style="text-align: center"><b>Detalle</b></td>
                            <td style="text-align: center"><b>Acciones</b></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($historials as $historial)
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>{{ $historial->paciente->nombres . ' ' . $historial->paciente->apellidos }}</td>
                                <td>{{ $historial->doctor->nombres . ' ' . $historial->doctor->apellidos }}</td>
                                <td style="text-align: center">{{ $historial->fecha_visita }}</td>
                                <td>{!! \Illuminate\Support\Str::limit(strip_tags($historial->detalle), 60) !!}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('admin/historiales/' . $historial->id) }}"
                                           type="button" class="btn btn-info btn-sm" title="Ver">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/historiales/' . $historial->id . '/edit') }}"
                                           type="button" class="btn btn-success btn-sm" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @can('admin.historiales.pdf')
                                        <a href="{{ url('admin/historiales/' . $historial->id . '/pdf') }}"
                                           type="button" class="btn btn-warning btn-sm" title="Imprimir PDF" target="_blank">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        @endcan
                                        <a href="{{ url('admin/historiales/' . $historial->id . '/confirm-delete') }}"
                                           type="button" class="btn btn-danger btn-sm" title="Eliminar">
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
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Historiales",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",
                                    "infoFiltered": "(Filtrado de MAX total Historiales)",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Historiales",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
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
                                "lengthChange": true,
                                "autoWidth": false,
                                buttons: [
                                    {
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [
                                            { text: 'Copiar', extend: 'copy' },
                                            { extend: 'pdf' },
                                            { extend: 'csv' },
                                            { extend: 'excel' },
                                            { text: 'Imprimir', extend: 'print' }
                                        ]
                                    },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
