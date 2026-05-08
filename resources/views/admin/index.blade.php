@extends('layouts.admin')
@section('content')

    {{-- Saludo centrado --}}
    <div style="text-align:center; margin-bottom: 32px;">
        <h1 style="font-family: 'Playfair Display', 'Georgia', serif; font-size: 2.2rem; font-weight: 700; color: #0d1b2a; letter-spacing: -0.5px; margin-bottom: 6px;">
            Bienvenido
        </h1>
        <p style="font-size: 15px; color: #5a7184; font-weight: 500;">
            {{ Auth::user()->email }}
        </p>
        <span style="display:inline-block; margin-top:6px; padding: 4px 14px; background: #e8f0fe; border-radius: 20px; font-size: 12px; font-weight: 600; color: #1e6fff; text-transform: capitalize;">
            {{ Auth::user()->roles->pluck('name')->first() ?? 'Usuario' }}
        </span>
    </div>

    {{-- Tarjetas de estadísticas --}}
    <div class="row">

        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #1e6fff; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_usuarios }}</h3>
                        <p style="color:#5a7184;">Usuarios</p>
                    </div>
                    <div class="icon" style="color:#1e6fff; opacity:0.15;"><i class="ion fas bi bi-file-person"></i></div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer" style="background:#1e6fff; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #8b5cf6; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_secretarias }}</h3>
                        <p style="color:#5a7184;">Secretarias</p>
                    </div>
                    <div class="icon" style="color:#8b5cf6; opacity:0.15;"><i class="ion fas bi bi-person-circle"></i></div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer" style="background:#8b5cf6; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #10b981; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_pacientes }}</h3>
                        <p style="color:#5a7184;">Pacientes</p>
                    </div>
                    <div class="icon" style="color:#10b981; opacity:0.15;"><i class="ion fas bi bi-person-fill-check"></i></div>
                    <a href="{{ url('admin/pacientes') }}" class="small-box-footer" style="background:#10b981; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #f59e0b; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_consultorios }}</h3>
                        <p style="color:#5a7184;">Consultorios</p>
                    </div>
                    <div class="icon" style="color:#f59e0b; opacity:0.15;"><i class="ion fas bi bi-building-fill-add"></i></div>
                    <a href="{{ url('admin/consultorios') }}" class="small-box-footer" style="background:#f59e0b; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.doctores.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #ef4444; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_doctores }}</h3>
                        <p style="color:#5a7184;">Doctores</p>
                    </div>
                    <div class="icon" style="color:#ef4444; opacity:0.15;"><i class="ion fas bi bi-person-lines-fill"></i></div>
                    <a href="{{ url('admin/doctores') }}" class="small-box-footer" style="background:#ef4444; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #14b8a6; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_horarios }}</h3>
                        <p style="color:#5a7184;">Horarios</p>
                    </div>
                    <div class="icon" style="color:#14b8a6; opacity:0.15;"><i class="ion fas bi bi-calendar2-week"></i></div>
                    <a href="{{ url('admin/horarios') }}" class="small-box-footer" style="background:#14b8a6; color:#fff;">Más información <i class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.reservas.reportes')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #6366f1; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_eventos }}</h3>
                        <p style="color:#5a7184;">Reservas</p>
                    </div>
                    <div class="icon" style="color:#6366f1; opacity:0.15;"><i class="ion fas bi bi-calendar2-check"></i></div>
                    <a href="{{ url('admin/reservas/reportes') }}" class="small-box-footer" style="background:#6366f1; color:#fff;">Más información <i class="fas bi bi-calendar2-check"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.configuraciones.index')
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background:#fff; border:2px solid #0ea5e9; color:#0d1b2a;">
                    <div class="inner">
                        <h3 style="color:#0d1b2a;">{{ $total_configuraciones }}</h3>
                        <p style="color:#5a7184;">Configuraciones</p>
                    </div>
                    <div class="icon" style="color:#0ea5e9; opacity:0.15;"><i class="ion fas bi bi-gear"></i></div>
                    <a href="{{ url('/admin/configuraciones') }}" class="small-box-footer" style="background:#0ea5e9; color:#fff;">Más información <i class="fas bi bi-gear"></i></a>
                </div>
            </div>
        @endcan

    </div>

    {{-- Sección de calendario y reservas (solo para usuarios con permiso de reservar) --}}
    @can('cargar_datos_consultorios')

        {{-- Card: Horarios de atención por consultorio --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de atención de doctores</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <label for="consultorio_select">Consultorios</label>
                            </div>
                            <div class="col-md-4">
                                <select name="consultorio_id" id="consultorio_select" class="form-control">
                                    <option value="">Seleccionar consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">
                                            {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <script>
                            $('#consultorio_select').on('change', function () {
                                var consultorio_id = $(this).val();
                                var url = "{{ route('cargar_datos_consultorios', ':id') }}";
                                url = url.replace(':id', consultorio_id);

                                if (consultorio_id) {
                                    $.ajax({
                                        url: url,
                                        type: 'GET',
                                        success: function (data) {
                                            $('#consultorio_info').html(data);
                                        },
                                        error: function () {
                                            alert('Error al obtener los datos del consultorio');
                                        }
                                    });
                                } else {
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                        <hr>
                        <div id="consultorio_info"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card: Reserva de citas médicas --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reserva de citas médicas</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <label for="doctor_select">Doctores</label>
                            </div>
                            <div class="col-md-4">
                                <select name="doctor_id" id="doctor_select" class="form-control">
                                    <option value="">Seleccionar doctor</option>
                                    @foreach($doctores as $doctore)
                                        <option value="{{ $doctore->id }}">
                                            {{ $doctore->nombres . ' ' . $doctore->apellidos . ' - ' . $doctore->especialidad }}
                                        </option>
                                    @endforeach
                                </select>
                                <script>
                                    $('#doctor_select').on('change', function () {
                                        var doctor_id = $(this).val();

                                        var calendarEl = document.getElementById('calendar');
                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialView: 'dayGridMonth',
                                            locale: 'es',
                                            events: [],
                                        });

                                        if (doctor_id) {
                                            $.ajax({
                                                url: "{{ url('/cargar_reserva_doctores/') }}" + '/' + doctor_id,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function (data) {
                                                    calendar.addEventSource(data);
                                                },
                                                error: function () {
                                                    alert('Error al obtener los datos del doctor');
                                                }
                                            });
                                        }
                                        calendar.render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalReserva">
                                    <i class="bi bi-plus-circle"></i> Registrar cita médica
                                </button>
                                <a href="{{ url('/admin/ver_reservas', Auth::user()->id) }}" class="btn btn-success">
                                    <i class="bi bi-calendar2-check"></i> Ver mis reservas
                                </a>
                            </div>
                        </div>

                        {{-- Modal de reserva --}}
                        <form action="{{ url('/admin/eventos/create') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalReservaLabel">Reserva de cita médica</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                {{-- Doctor --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="modal_doctor_id">Doctor <b>*</b></label>
                                                        <select name="doctor_id" id="modal_doctor_id" class="form-control" required>
                                                            <option value="">-- Seleccione un doctor --</option>
                                                            @foreach($doctores as $doctore)
                                                                <option value="{{ $doctore->id }}">
                                                                    {{ $doctore->nombres . ' ' . $doctore->apellidos . ' - ' . $doctore->especialidad }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Consultorio --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="modal_consultorio_id">Consultorio <b>*</b></label>
                                                        <select name="consultorio_id" id="modal_consultorio_id" class="form-control" required>
                                                            <option value="">-- Seleccione un consultorio --</option>
                                                            @foreach($consultorios as $consultorio)
                                                                <option value="{{ $consultorio->id }}">
                                                                    {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Fecha --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="fecha_reserva">Fecha de reserva <b>*</b></label>
                                                        <input type="date" id="fecha_reserva" name="fecha_reserva"
                                                               value="{{ date('Y-m-d') }}" class="form-control" required>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                const fechaReservaInput = document.getElementById('fecha_reserva');
                                                                fechaReservaInput.addEventListener('change', function () {
                                                                    let selectedDate = this.value;
                                                                    let today = new Date().toISOString().slice(0, 10);
                                                                    if (selectedDate < today) {
                                                                        this.value = null;
                                                                        alert('No se puede reservar en una fecha pasada.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>

                                                {{-- Hora --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="hora_reserva">Hora de reserva <b>*</b></label>
                                                        <input type="time" name="hora_reserva" id="hora_reserva" class="form-control" required>
                                                        @error('hora_reserva')
                                                            <small style="color:red">{{ $message }}</small>
                                                        @enderror
                                                        @if($message = Session::get('hora_reserva'))
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function () {
                                                                    $('#modalReserva').modal('show');
                                                                });
                                                            </script>
                                                            <small style="color:red">{{ $message }}</small>
                                                        @endif
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                const horaReservaInput = document.getElementById('hora_reserva');
                                                                horaReservaInput.addEventListener('change', function () {
                                                                    let selectedTime = this.value;
                                                                    if (selectedTime) {
                                                                        // Redondear a la hora en punto
                                                                        selectedTime = selectedTime.split(':')[0] + ':00';
                                                                        this.value = selectedTime;
                                                                    }
                                                                    if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                        this.value = null;
                                                                        alert('Por favor ingrese un horario entre las 08:00 y las 20:00.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-check-circle"></i> Registrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>

    @endcan

    {{-- Tabla de reservas para el doctor logueado --}}
    @if(Auth::check() && Auth::user()->doctor)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Mis reservas de citas</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            <thead style="background-color: #c0c0c0">
                            <tr>
                                <td style="text-align: center"><b>Nro</b></td>
                                <td style="text-align: center"><b>Paciente / Usuario</b></td>
                                <td style="text-align: center"><b>Fecha de reserva</b></td>
                                <td style="text-align: center"><b>Hora de reserva</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1; ?>
                            @foreach($eventos as $evento)
                                @if(Auth::user()->doctor->id == $evento->doctor_id)
                                    <tr>
                                        <td style="text-align: center">{{ $contador++ }}</td>
                                        <td>{{ $evento->user->name }}</td>
                                        <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}</td>
                                        <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                $("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                        "infoFiltered": "(Filtrado de MAX total Reservas)",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Reservas",
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
    @endif

@endsection
