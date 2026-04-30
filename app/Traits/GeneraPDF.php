<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait GeneraPDF
{
    /**
     * Agrega pie de página estándar a un PDF generado con DomPDF:
     * usuario que imprime, número de página y fecha/hora.
     *
     * @param  \Barryvdh\DomPDF\PDF  $pdf
     * @return void
     */
    protected function agregarPiePagina($pdf): void
    {
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $canvas->page_text(20, 800, 'Impreso por: ' . Auth::user()->email, null, 10, [0, 0, 0]);
        $canvas->page_text(270, 800, 'Página {PAGE_NUM} de {PAGE_COUNT}', null, 10, [0, 0, 0]);
        $canvas->page_text(450, 800, 'Fecha: ' . Carbon::now()->format('d/m/Y') . ' - ' . Carbon::now()->format('H:i:s'), null, 10, [0, 0, 0]);
    }
}
