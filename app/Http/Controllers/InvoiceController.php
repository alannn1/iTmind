<?php

namespace App\Http\Controllers;

use App\Models\Payment_m;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $checkout = Payment_m::find($id);
        return view('invoice.invoice', compact('checkout'));
    }
}
