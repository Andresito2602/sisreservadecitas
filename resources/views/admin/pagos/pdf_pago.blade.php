<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Comprobante de Pago</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            color: #111;
            margin: 40px 50px;
        }

        /* ── Encabezado de la clínica ── */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }
        .header-table td {
            font-size: 8pt;
            vertical-align: top;
            padding: 0;
        }

        /* ── Título del comprobante ── */
        .titulo-comprobante {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            margin: 8px 0 10px 0;
        }

        /* ── Tabla de datos del pago ── */
        .datos-table {
            width: 100%;
            border-collapse: collapse;
        }
        .datos-table td {
            padding: 4px 6px;
            font-size: 10pt;
            vertical-align: middle;
        }
        .datos-label {
            font-weight: bold;
            width: 110px;
            white-space: nowrap;
        }
        .qr-cell {
            width: 100px;
            height: 100px;
            text-align: center;
            vertical-align: middle;
        }

        /* ── Firmas ── */
        .firmas-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .firmas-table td {
            text-align: center;
            font-size: 9pt;
            padding: 4px;
            vertical-align: bottom;
        }

        /* ── Separador ── */
        .separador {
            border: none;
            border-top: 2px dashed #555;
            margin: 20px 0;
        }

        /* ── Línea de firma ── */
        .linea-firma {
            border-top: 1px solid #000;
            width: 160px;
            margin: 0 auto 4px auto;
        }
    </style>
</head>
<body>

    {{-- ══════════════════════════════════════════════════════ --}}
    {{-- COMPROBANTE ORIGINAL                                   --}}
    {{-- ══════════════════════════════════════════════════════ --}}

    {{-- Encabezado clínica --}}
    <table class="header-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="text-align: left;">
                {{ $configuracion->nombre }}<br>
                {{ $configuracion->direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo }}
            </td>
            <td width="400px"></td>
            <td style="text-align: right;">
                <img src="{{ public_path('storage/' . $configuracion->logo) }}" alt="logo" width="80px">
            </td>
        </tr>
    </table>

    {{-- Título --}}
    <div class="titulo-comprobante">COMPROBANTE DE PAGO - ORIGINAL</div>

    {{-- Datos del pago + QR --}}
    <table class="datos-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 75%;">
                <table cellpadding="0" cellspacing="0" style="width:100%;">
                    <tr>
                        <td class="datos-label">Sr(es):</td>
                        <td>{{ $pago->paciente->nombres }} {{ $pago->paciente->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Fecha:</td>
                        <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Doctor:</td>
                        <td>{{ $pago->doctor->nombres }} {{ $pago->doctor->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Especialidad:</td>
                        <td>{{ $pago->doctor->especialidad }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Monto:</td>
                        <td>{{ number_format($pago->monto, 2) }}</td>
                    </tr>
                    @if($pago->descripcion)
                    <tr>
                        <td class="datos-label">Descripción:</td>
                        <td>{{ $pago->descripcion }}</td>
                    </tr>
                    @endif
                </table>
            </td>
            <td style="width: 25%; text-align: center; vertical-align: middle;">
                <img src="data:image/png;base64,{{ $qrBase64 }}" width="110" height="110" alt="QR">
            </td>
        </tr>
    </table>

    {{-- Firmas --}}
    <table class="firmas-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 50%;">
                <div class="linea-firma"></div>
                Secretaria<br>
                {{ $configuracion->nombre }}
            </td>
            <td style="width: 50%;">
                <div class="linea-firma"></div>
                Recibí conforme
            </td>
        </tr>
    </table>

    {{-- ══════════════════════════════════════════════════════ --}}
    {{-- SEPARADOR DASHED                                       --}}
    {{-- ══════════════════════════════════════════════════════ --}}
    <hr class="separador">

    {{-- ══════════════════════════════════════════════════════ --}}
    {{-- COMPROBANTE COPIA                                      --}}
    {{-- ══════════════════════════════════════════════════════ --}}

    {{-- Encabezado clínica --}}
    <table class="header-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="text-align: left;">
                {{ $configuracion->nombre }}<br>
                {{ $configuracion->direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo }}
            </td>
            <td width="400px"></td>
            <td style="text-align: right;">
                <img src="{{ public_path('storage/' . $configuracion->logo) }}" alt="logo" width="80px">
            </td>
        </tr>
    </table>

    {{-- Título --}}
    <div class="titulo-comprobante">COMPROBANTE DE PAGO - COPIA</div>

    {{-- Datos del pago + QR --}}
    <table class="datos-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 75%;">
                <table cellpadding="0" cellspacing="0" style="width:100%;">
                    <tr>
                        <td class="datos-label">Sr(es):</td>
                        <td>{{ $pago->paciente->nombres }} {{ $pago->paciente->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Fecha:</td>
                        <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Doctor:</td>
                        <td>{{ $pago->doctor->nombres }} {{ $pago->doctor->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Especialidad:</td>
                        <td>{{ $pago->doctor->especialidad }}</td>
                    </tr>
                    <tr>
                        <td class="datos-label">Monto:</td>
                        <td>{{ number_format($pago->monto, 2) }}</td>
                    </tr>
                    @if($pago->descripcion)
                    <tr>
                        <td class="datos-label">Descripción:</td>
                        <td>{{ $pago->descripcion }}</td>
                    </tr>
                    @endif
                </table>
            </td>
            <td style="width: 25%; text-align: center; vertical-align: middle;">
                <img src="data:image/png;base64,{{ $qrBase64 }}" width="110" height="110" alt="QR">
            </td>
        </tr>
    </table>

    {{-- Firmas --}}
    <table class="firmas-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 50%;">
                <div class="linea-firma"></div>
                Secretaria<br>
                {{ $configuracion->nombre }}
            </td>
            <td style="width: 50%;">
                <div class="linea-firma"></div>
                Recibí conforme
            </td>
        </tr>
    </table>

</body>
</html>
