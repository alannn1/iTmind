<?php

namespace App\Http\Controllers;

use App\Models\FormRekomen_m;
use App\Models\Identitas_m;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $countForm_rekomen = FormRekomen_m::all()->count();
        $countIdentitas = Identitas_m::all()->count();

        return view('home', compact(['countForm_rekomen', 'countIdentitas']));
    }
}
