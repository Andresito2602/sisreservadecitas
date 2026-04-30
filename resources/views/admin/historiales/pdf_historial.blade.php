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
    </style>
</head>
<body>

    {{-- ── Encabezado: igual al PDF de doctores ── --}}
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
                <td>{{ $historial->paciente->nombres . ' ' . $historial->paciente->apellidos }}</td>
            </tr>
            <tr>
                <td class="campo-label">Carnet de identidad:</td>
                <td>{{ $historial->paciente->cc }}</td>
            </tr>
            <tr>
                <td class="campo-label">Nro de seguro:</td>
                <td>{{ $historial->paciente->nro_seguro }}</td>
            </tr>
            <tr>
                <td class="campo-label">Fecha de nacimiento:</td>
                <td>{{ $historial->paciente->fecha_nacimiento }}</td>
            </tr>
            <tr>
                <td class="campo-label">G&eacute;nero:</td>
                <td>{{ $historial->paciente->genero == 'M' ? 'MASCULINO' : 'FEMENINO' }}</td>
            </tr>
            <tr>
                <td class="campo-label">Grupo sangu&iacute;neo:</td>
                <td>{{ $historial->paciente->grupo_sanguineo }}</td>
            </tr>
            <tr>
                <td class="campo-label">Alergias:</td>
                <td>{{ $historial->paciente->alergias }}</td>
            </tr>
            <tr>
                <td class="campo-label">Contacto de emergencia:</td>
                <td>{{ $historial->paciente->contacto_emergencia }}</td>
            </tr>
            @if($historial->paciente->observaciones)
            <tr>
                <td class="campo-label">Observaciones:</td>
                <td>{{ $historial->paciente->observaciones }}</td>
            </tr>
            @endif
        </table>
    </div>

    {{-- ── Información del doctor ── --}}
    <div class="seccion">
        <div class="seccion-titulo">Informaci&oacute;n del Doctor</div>
        <table class="campo-tabla" cellpadding="0" cellspacing="0">
            <tr>
                <td class="campo-label">Doctor:</td>
                <td>{{ strtoupper($historial->doctor->nombres . ' ' . $historial->doctor->apellidos) }}</td>
            </tr>
            <tr>
                <td class="campo-label">Licencia m&eacute;dica:</td>
                <td>{{ $historial->doctor->licencia_medica }}</td>
            </tr>
            <tr>
                <td class="campo-label">Especialidad:</td>
                <td>{{ strtoupper($historial->doctor->especialidad) }}</td>
            </tr>
        </table>
    </div>

    {{-- ── Diagnóstico realizado ── --}}
    <div class="seccion">
        <div class="seccion-titulo">Diagn&oacute;stico realizado</div>
        <table class="campo-tabla" cellpadding="0" cellspacing="0">
            <tr>
                <td class="campo-label">Fecha:</td>
                <td>{{ \Carbon\Carbon::parse($historial->fecha_visita)->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td class="campo-label" style="padding-top: 8px;">Resultado:</td>
                <td></td>
            </tr>
        </table>
        <div class="detalle-box">
            {!! $historial->detalle !!}
        </div>
    </div>

</body>
</html>
