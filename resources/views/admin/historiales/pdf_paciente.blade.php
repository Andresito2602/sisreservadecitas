<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Historial Cl&iacute;nico</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            color: #111;
            margin: 40px 50px;
        }

        /* ── Secciones ── */
        .seccion {
            margin-bottom: 16px;
        }
        .seccion-titulo {
            font-size: 11pt;
            font-weight: bold;
            border-bottom: 1px solid #555;
            padding-bottom: 3px;
            margin-bottom: 8px;
        }

        /* ── Filas de datos ── */
        .campo-tabla {
            width: 100%;
        }
        .campo-tabla td {
            padding: 3px 4px;
            vertical-align: top;
            font-size: 10pt;
        }
        .campo-label {
            font-weight: bold;
            width: 190px;
            white-space: nowrap;
        }

        /* ── Caja de detalle ── */
        .detalle-box {
            margin-top: 6px;
            padding: 8px 10px;
            border: 1px solid #ccc;
            font-size: 10pt;
            line-height: 1.6;
        }

        /* ── Separador entre diagnósticos ── */
        .diagnostico-separador {
            border: none;
            border-top: 1px dashed #aaa;
            margin: 14px 0;
        }
    </style>
</head>
<body>

    {{-- ── Encabezado ── --}}
    <table border="0" style="font-size: 8pt; width: 100%;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="text-align: left; vertical-align: top;">
                {{ $configuracion->nombre }}<br>
                {{ $configuracion->direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo }}
            </td>
            <td width="450px"></td>
            <td style="text-align: right; vertical-align: top;">
                <img src="{{ public_path('storage/' . $configuracion->logo) }}" alt="logo" width="80px">
            </td>
        </tr>
    </table>

    <br>

    {{-- ── Título ── --}}
    <h2 style="text-align: center;"><u>Historial cl&iacute;nico</u></h2>

    <br>

    {{-- ── Información del paciente ── --}}
    <div class="seccion">
        <div class="seccion-titulo">Informaci&oacute;n del paciente</div>
        <table class="campo-tabla" cellpadding="0" cellspacing="0">
            <tr>
                <td class="campo-label">Paciente:</td>
                <td>{{ $paciente->nombres . ' ' . $paciente->apellidos }}</td>
            </tr>
            <tr>
                <td class="campo-label">Carnet de identidad:</td>
                <td>{{ $paciente->cc }}</td>
            </tr>
            <tr>
                <td class="campo-label">Nro de seguro:</td>
                <td>{{ $paciente->nro_seguro }}</td>
            </tr>
            <tr>
                <td class="campo-label">Fecha de nacimiento:</td>
                <td>{{ $paciente->fecha_nacimiento }}</td>
            </tr>
            <tr>
                <td class="campo-label">G&eacute;nero:</td>
                <td>{{ $paciente->genero == 'M' ? 'MASCULINO' : 'FEMENINO' }}</td>
            </tr>
            <tr>
                <td class="campo-label">Grupo sangu&iacute;neo:</td>
                <td>{{ $paciente->grupo_sanguineo }}</td>
            </tr>
            <tr>
                <td class="campo-label">Alergias:</td>
                <td>{{ $paciente->alergias }}</td>
            </tr>
            <tr>
                <td class="campo-label">Contacto de emergencia:</td>
                <td>{{ $paciente->contacto_emergencia }}</td>
            </tr>
            @if($paciente->observaciones)
            <tr>
                <td class="campo-label">Observaciones:</td>
                <td>{{ $paciente->observaciones }}</td>
            </tr>
            @endif
        </table>
    </div>

    {{-- ── Diagnósticos realizados ── --}}
    <div class="seccion">
        <div class="seccion-titulo">Diagn&oacute;sticos realizados</div>

        @foreach($historiales as $historial)

            <table class="campo-tabla" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="campo-label">Fecha:</td>
                    <td>{{ \Carbon\Carbon::parse($historial->fecha_visita)->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td class="campo-label">Doctor:</td>
                    <td>{{ strtoupper($historial->doctor->nombres . ' ' . $historial->doctor->apellidos) }} &mdash; {{ strtoupper($historial->doctor->especialidad) }}</td>
                </tr>
                <tr>
                    <td class="campo-label" style="padding-top: 8px;">Resultado:</td>
                    <td></td>
                </tr>
            </table>
            <div class="detalle-box">
                {!! $historial->detalle !!}
            </div>

            @if(!$loop->last)
                <hr class="diagnostico-separador">
            @endif

        @endforeach
    </div>

</body>
</html>
