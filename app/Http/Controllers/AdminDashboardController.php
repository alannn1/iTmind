<?php

namespace App\Http\Controllers;

use App\Models\Apesaing_m;
use App\Models\FormRekomen_m;
use App\Models\Identitas_m;
use App\Models\Payment_m;
use App\Models\Step2_m;
use App\Models\TargetA_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil Data
        $countIdentitas = Identitas_m::all()->count();
        $countStep2 = Step2_m::all()->count();
        $countPesaing = Apesaing_m::all()->count();
        $countTarget = TargetA_m::all()->count();
        
        // Riwayat Pembayaran
        $query = Payment_m::query();
            // Search
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%');
        }
            // Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $checkout = $query->get();
        

        // Grafik Pendapatan Payment
        $total_price = Payment_m::select(DB::raw("CAST(SUM(total_price) as int) as total_price"))
            ->where('status', 'Paid')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('total_price');

        $bulan = Payment_m::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->whereYear('created_at', date('Y'))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');

        // Grafik User Form Rekomendasi
        $user = FormRekomen_m::select(DB::raw("COUNT(nama) as user"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('user');

        $bulanUser = FormRekomen_m::select(DB::raw("MONTHNAME(created_at) as bulanUser"))
            ->whereYear('created_at', date('Y'))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulanUser');


        return view('admin/dashboard-admin', compact(['countIdentitas', 'countStep2', 'countPesaing', 'countTarget', 'countForm_rekomen', 'checkout', 'total_price', 'bulan', 'user', 'bulanUser']));
    }
    public function profileAdmin()
    {
        return view('admin/profile-admin');
    }
}
