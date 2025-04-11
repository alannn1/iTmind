<?php

namespace App\Http\Controllers;

use App\Models\Apesaing_m;
use Illuminate\Http\Request;
use App\Models\Identitas_m;
use App\Models\Step2_m;
use App\Models\TargetA_m;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FormKonsulController extends Controller
{
    var $data;

//--------------------------------Identitas---------------------------------//
    public function __construct()
    {
        $this->data['opt_jenis'] = [
            '' => '-Pilih Jenis Usaha-',
            'jasa' => 'Jasa',
            'produk' => 'Produk',
            'manufaktur' => 'Manufaktur' 
        ];
    }
    public function showIdentitas() : View
    {
        $identitas = Identitas_m::all();

        return view('admin/form/identitas/identitas-show', compact('identitas'));
    }
    public function addIdentitas()
    {
        $data=[
            'is_update' => 0,
            'optjenis' => $this->data['opt_jenis']
        ];
        return view('admin/form/identitas/identitas-add', $data);
    }

    public function saveIdentitas(Request $request): RedirectResponse
    {
        $inputIdentitas = Identitas_m::getFillableFields();

        $filledFieldIdentitas = array_filter($inputIdentitas, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldIdentitas) / count($inputIdentitas)) * 100;

        $request->session()->put('percentage', $percentage);

        $data = Identitas_m::insert_record($request);
        Identitas_m::create($data);

        $facts = [
            'logo' => $request->input('logo'),
            'nama' => $request->input('nama'),
            'nama_usaha' => $request->input('nama_usaha'),
            'jenis' => $request->input('jenis'),
            'tahun_berdiri' => $request->input('tahun_berdiri'),
            'produk_jasa' => $request->input('produk_jasa'),
            'website' => $request->input('website'),
            'ig' => $request->input('ig'),
            'tiktok' => $request->input('tiktok'),
            'fb' => $request->input('fb'),
            'shopee' => $request->input('shopee'),
            'trello' => $request->input('trello'),
            'lynk_id' => $request->input('lynk_id'),
            'wa_bisnis' => $request->input('wa_bisnis'),
            'maps' => $request->input('maps'),
        ];

        $recommendations = Identitas_m::evaluateRule($facts);

        return redirect()->back()->with([
            'is_update' => 0,
            'data' => $data,
            'success' => 'Data berhasil disimpan',
            'recommendations' => $recommendations,
        ]);
    }
    public function updateIdentitas(Request $request, $id): RedirectResponse
    {
        $inputIdentitas = Identitas_m::getFillableFields();

        $existingData = Identitas_m::findOrFail($id);

        $data = Identitas_m::update_record($request, $inputIdentitas, $existingData);

        $existingData->update($data);

        $filledFieldIdentitas = array_filter($inputIdentitas, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldIdentitas) / count($inputIdentitas)) * 100;
        $request->session()->put('percentage', $percentage);

        return redirect()->back()->with([
            'is_update' => 1,
            'data' => $data,
            'success' => 'Data berhasil diperbarui',
        ]);
    }
    
    public function editIdentitas($id)
    {
        $identitas = Identitas_m::where('id_user', $id)->first();

        if (!$identitas) {
            return redirect()->route('form/identitas/edit')->with('error', 'Identitas tidak ditemukan.');
        }
        $optjenis = [
            '' => '',
            'jasa' => 'Jasa',
            'produk' => 'Produk',
            'manufaktur' => 'Manufaktur' 
        ];
        return view('admin/form/identitas/identitas-edit', compact('identitas', 'optjenis'));
    }
    
    public function deleteIdentitas($id): RedirectResponse
    {
        $identitas = Identitas_m::findOrFail($id);
        $identitas->delete();
    
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
//--------------------------------Step2---------------------------------//
public function showStep2() : View
    {
        $step2 = Step2_m::all();
        return view('admin/form/step2/step2-show', compact('step2'));
    }
    public function addStep2()
    {
        $data=[
            'is_update' => 0,
        ];
        return view('admin/form/step2/step2-add', $data);
    }

    public function saveStep2(Request $request): RedirectResponse
    {
        $inputStep2 = Step2_m::getFillableFields();

        $filledFieldStep2 = array_filter($inputStep2, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldStep2) / count($inputStep2)) * 100;

        $request->session()->put('percentage', $percentage);

        $data = Step2_m::insert_record($request);
        
        session(['data'=>$data]);

        Step2_m::create($data);

        $facts = [
            'strength' => $request->input('strenght'),
            'weakness' => $request->input('weakness'),
            'opportunity' => $request->input('opportunity'),
            'threats' => $request->input('threats'),
            'product' => $request->input('product'),
            'price' => $request->input('price'),
            'place' => $request->input('place'),
            'promotion' => $request->input('promotion'),
            'people' => $request->input('people'),
            'process' => $request->input('process'),
            'physical_evidence' => $request->input('physical_evidence'),
            'performance' => $request->input('performance'),
            'partnership' => $request->input('partnership'),
        ];
        $recommendations = Step2_m::evaluateRules($facts);        
        
        return redirect()->back()->with([
            'is_update' => 0,
            'data' => $data,
            'success' => 'Data berhasil',
            'recommendations' => $recommendations
        ]);
    }
    public function editStep2($id)
    {
        $step2 = Step2_m::where('id_user', $id)->first();

        if (!$step2) {
            return redirect()->route('form/step2/edit')->with('error', 'Identitas tidak ditemukan.');
        }
        
        return view('admin/form/step2/step2-edit', compact('step2'));
    }
    public function updateStep2(Request $request, $id): RedirectResponse
    {
        $inputStep2 = Step2_m::getFillableFields();

        $existingData = Step2_m::findOrFail($id);

        $data = Step2_m::update_record($request, $inputStep2, $existingData);

        $existingData->update($data);

        $filledFieldStep2 = array_filter($inputStep2, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldStep2) / count($inputStep2)) * 100;
        $request->session()->put('percentage', $percentage);

        return redirect()->back()->with([
            'is_update' => 1,
            'data' => $data,
            'success' => 'Data berhasil diperbarui',
        ]);
    }
    public function deleteStep2($id): RedirectResponse
    {
        $identitas = Step2_m::findOrFail($id);
        $identitas->delete_record();
    
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    //--------------------------------Analisis Pesaing---------------------------------//
    public function showPesaing() : View
    {
        $pesaing = Apesaing_m::all();
        return view('admin/form/analisisP/analisis-pesaing-show', compact('pesaing'));
    }
    public function addPesaing()
    {
        $data=[
            'is_update' => 0,
        ];
        return view('admin/form/analisisP/analisis-pesaing-add', $data);
    }

    public function savePesaing(Request $request): RedirectResponse
    {
        $inputPesaing = Apesaing_m::getFillableFields();

        $filledFieldPesaing = array_filter($inputPesaing, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldPesaing) / count($inputPesaing)) * 100;

        $request->session()->put('percentage', $percentage);

        $data = Apesaing_m::insert_record($request);
        
        session(['data'=>$data]);

        Apesaing_m::create($data);

        $facts = [
            'strength' => $request->input('strenght'),
            'weakness' => $request->input('weakness'),
            'opportunity' => $request->input('opportunity'),
            'threats' => $request->input('threats'),
            'product' => $request->input('product'),
            'price' => $request->input('price'),
            'place' => $request->input('place'),
            'promotion' => $request->input('promotion'),
            'people' => $request->input('people'),
            'process' => $request->input('process'),
            'physical_evidence' => $request->input('physical_evidence'),
            'performance' => $request->input('performance'),
            'partnership' => $request->input('partnership'),
        ];
        $recommendations = Apesaing_m::evaluateRule($facts);      
        
        return redirect()->back()->with([
            'is_update' => 0,
            'data' => $data,
            'success' => 'Data berhasil',
            'recommendations' => $recommendations
        ]);
    }
    public function editPesaing($id)
    {
        $pesaing = Apesaing_m::where('id_user', $id)->first();

        if (!$pesaing) {
            return redirect()->route('form/pesaing/edit')->with('error', 'Identitas tidak ditemukan.');
        }
        
        return view('admin/form/analisisP/analisis-pesaing-edit', compact('pesaing'));
    }
    public function updatePesaing(Request $request, $id): RedirectResponse
    {
        $inputPesaing = Apesaing_m::getFillableFields();

        $existingData = Apesaing_m::findOrFail($id);

        $data = Apesaing_m::update_record($request, $inputPesaing, $existingData);

        $existingData->update($data);

        $filledFieldPesaing = array_filter($inputPesaing, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldPesaing) / count($inputPesaing)) * 100;
        $request->session()->put('percentage', $percentage);

        return redirect()->back()->with([
            'is_update' => 1,
            'data' => $data,
            'success' => 'Data berhasil diperbarui',
        ]);
    }
    public function deletePesaing($id): RedirectResponse
    {
        $pesaing = Apesaing_m::findOrFail($id);
        $pesaing->delete_record();
    
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    //--------------------------------Target Audience---------------------------------//
    public function showTarget() : View
    {
        $target = TargetA_m::all();
        return view('admin/form/target/target-show', compact('target'));
    }
    public function addTarget()
    {
        $data=[
            'is_update' => 0,
        ];
        return view('admin/form/targetA/target-audience-add', $data);
    }

    public function saveTarget(Request $request): RedirectResponse
    {
        $inputTarget = TargetA_m::getFillableFields();

        $filledFieldTarget = array_filter($inputTarget, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldTarget) / count($inputTarget)) * 100;

        $request->session()->put('percentage', $percentage);

        $data = TargetA_m::insert_record($request);
        
        session(['data'=>$data]);

        TargetA_m::create($data);

        $facts = [
            'jk' => $request->input('jk'),
            'umur' => $request->input('umur'),
            'lokasi' => $request->input('lokasi'),
            'edukasi' => $request->input('edukasi'),
            'penghasilan' => $request->input('penghasilan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'kegiatan' => $request->input('kegiatan'),
            'brand_fav' => $request->input('brand_fav'),
            'problem' => $request->input('problem'),
        ];
        $recommendations = TargetA_m::evaluateRule($facts);
        
        return redirect()->back()->with([
            'is_update' => 0,
            'data' => $data,
            'success' => 'Data berhasil',
            'recommendatiions' => $recommendations
        ]);
    }
    public function editTarget($id)
    {
        $target = TargetA_m::where('id_user', $id)->first();

        if (!$target) {
            return redirect()->route('form/target/edit')->with('error', 'Identitas tidak ditemukan.');
        }
        
        return view('admim/form/targetA/target-audience-edit', compact('target'));
    }
    public function updateTarget(Request $request, $id): RedirectResponse
    {
        $inputTarget = TargetA_m::getFillableFields();

        $existingData = TargetA_m::findOrFail($id);

        $data = TargetA_m::update_record($request, $inputTarget, $existingData);

        $existingData->update($data);

        $filledFieldStep2 = array_filter($inputTarget, fn($field) => $request->filled($field));
        $percentage = (count($filledFieldStep2) / count($inputTarget)) * 100;
        $request->session()->put('percentage', $percentage);

        return redirect()->back()->with([
            'is_update' => 1,
            'data' => $data,
            'success' => 'Data berhasil diperbarui',
        ]);
    }
    public function deleteTarget($id): RedirectResponse
    {
        $target = TargetA_m::findOrFail($id);
        $target->delete_record();
    
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}