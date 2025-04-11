<?php

namespace App\Http\Controllers;

use App\Models\Payment_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.checkout');
    }
    public function payment(Request $request)
    {   
        $request->merge(['total_price' => $this->calculatePrice(), 'status'=>'Unpaid']);
        $checkout = Payment_m::create($request->all());

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true; 
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $checkout->id,
                'gross_amount' => $checkout->total_price,
            ),
            'customer_details' => array(
                'alamat' => $request->alamat,
                'email' => $request->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment.payment', compact('snapToken', 'checkout'));
    }
    private function calculatePrice()
    {
        return 2500000;
    }
    public function callback(Request $request)
    {
        $server_key = config('midtrans.server_key');
        $hased = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$server_key);
        if($hased == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $checkout = Payment_m::find($request->order_id);
                $checkout->update(['status' => 'Paid']);
            }
        }
    }
    public function riwayat(Request $request)
    {
        $checkout = Payment_m::all();
        if($request->transaction_status == 'capture'){
            $payment = Payment_m::find($request->order_id);
            $payment->update(['status' => 'Paid']);
        }
        return view('pageview.riwayat-pembayaran', compact('checkout'));
    }
    public function cancel($id)
    {
        $checkout = Payment_m::find($id);

        if(!$checkout) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        $checkout->delete();
        return redirect()->route('/')->with('success', 'Pesanan berhasil dibatalkan');
    }
}
