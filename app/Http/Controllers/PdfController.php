<?php

namespace App\Http\Controllers;

use App\Models\Payment_m;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function downloadPdf($id)
    {
        $checkout = Payment_m::find($id);

        $pdf = Pdf::loadView('invoice.invoice-pdf', compact('checkout'));
        return $pdf->download('invoice_'. $checkout->id . '.pdf');
    }
}
