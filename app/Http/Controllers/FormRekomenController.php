<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormRekomen_m;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FormRekomenController extends Controller
{
    var $data;

    public function __construct()
    {
        $this->data['opt_jenis'] = [
            '' => '-Pilih Jenis Usaha-',
            'jasa' => 'Jasa',
            'produk' => 'Produk',
            'manufaktur' => 'Manufaktur' 
        ];
        $this->data['opt_kategori'] = [
            '' => '-Pilih Kategori-',
            'fashion' => 'fashion',
            'kuliner' => 'kuliner',
            'kesehatan' => 'kesehatan',
            'teknologi' => 'teknologi',
        ];
        $this->data['opt_omzet'] = [
            '' => '-Pilih Omzet Perbulan-',
            '1-2' => '1juta-2juta',
            '2-3' => '2juta-3juta',
            '3-4' => '3juta-4juta',
            '4-5' => '4juta-5juta',
            '>5' => '> 5juta',
        ];
    }
    public function show() : View
    {
        $formfree = FormRekomen_m::all();
        return view('#', compact('#'));
    }
    public function addForm()
    {
        $data=[
            'is_update' => 0,
            'optjenis' => $this->data['opt_jenis'],
            'optkategori' => $this->data['opt_kategori'],
            'optomzet' => $this->data['opt_omzet']
        ];
        return view('form/form-rekomen-add', $data);
    }

    public function saveForm(Request $request): RedirectResponse
    {
        $data = FormRekomen_m::insert_record($request);
        $data['sosmed'] = json_encode($request->input('sosmed', []));

        FormRekomen_m::create($data);
        
        $facts = [
            'jenis' => $request->input('jenis'),
            'kategori' => $request->input('kategori'),
            'website' => $request->input('website'),
            'sosmed' => json_encode($request->input('sosmed', [])),
            'shopee' => $request->input('shopee'),
            'maps' => $request->input('maps'),
            'wa_bisnis' => $request->input('wa_bisnis'),
            'omzet' => $request->input('omzet'),
        ];

        $recommendations = FormRekomen_m::evaluateRules($facts);

        return redirect()->back()->with([
            'is_update' => 0,
            'data' => $data,
            'success' => 'Data berhasil disimpan',
            'recommendations' => $recommendations
        ]);
    }

}
