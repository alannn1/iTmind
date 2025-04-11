<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthGoogleController;
use App\Http\Controllers\FormKonsulController;
use App\Http\Controllers\FormRekomenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

// -----------Home-----------//
Route::controller(HomeController::class)->group(function()
{
    Route::get('/', 'home')->name('/');
});

//---------------------------GUEST----------------------//

//----------Form Rekomen------------//
Route::controller(FormRekomenController::class)->group(function(){
    Route::get('form/rekomen/add', 'addForm');
    Route::post('form/rekomen/save', 'saveForm');
});

//----------Payment---------------//
Route::controller(PaymentController::class)->group(function(){
    Route::get('/produk', 'index')->name('produk');
    Route::post('/payment', 'payment')->name('payment');
    Route::get('/riwayat', 'riwayat')->name('riwayat');
    Route::delete('/cancel/{id}', 'cancel')->name('cancel');
});

//----------Invoice-------------//
Route::get('/invoice/{id}', [InvoiceController::class, 'invoice'])->middleware('auth');

//----------PDF download---------//
Route::get('/invoice/{id}/download', [PdfController::class, 'downloadPdf'])->name('invoice.download');

//---------Auth Google--------//
Route::controller(AuthGoogleController::class)->group(function()
{
    Route::get('auth/google', 'redirect')->name('auth.google');
    Route::get('auth/google-callback', 'callback')->name('auth.google-callback');
});

//--------------------------GUEST-----------------------//


//---------------------------ADMIN---------------------//

Route::controller(AdminDashboardController::class)->group(function() {
    Route::get('/admin', 'index')->name('admin')->middleware(['auth', 'admin']);
    Route::get('profile/admin', 'profileAdmin')->name('profile.admin')->middleware(['auth', 'admin']);
    Route::get('identitas/count', 'countIdentitas');
    Route::get('/grafik-pendapatan', 'grafikPendapatan');
    Route::get('/grafik-user', 'grafikUser');
});

//--------Form------------//
Route::controller(FormKonsulController::class)->group(function() 
{
    //---------Identitas---------//
    Route::get('form/identitas/add', 'addIdentitas')->name('form/identitas/add');
    Route::post('identitas/save', 'saveIdentitas')->name('identitas/save');
    Route::get('identitas/show', 'showIdentitas')->name('identitas/show')->middleware('auth', 'admin');
    Route::get('form/identitas/edit/{id}', 'editIdentitas')->name('form/identitas/edit');
    Route::put('identitas/{identitas}', 'updateIdentitas')->name('identitas/update');
    Route::delete('identitas/{identitas}', 'deleteIdentitas')->name('identitas/delete');

    //-------Step2-----------//
    Route::get('form/step2/add', 'addStep2')->name('form/step2/add');
    Route::post('form/step2/save', 'saveStep2')->name('form/step2/save');
    Route::get('step2/show', 'showStep2')->name('form/step2/show');
    Route::get('form/step2/edit/{id}', 'editStep2')->name('form/step2/edit');
    Route::put('step2/{step2}', 'updateStep2')->name('step2/update');
    Route::delete('step2/{step2}', 'deleteStep2')->name('step2/delete');

    //-------Analisis Pesaing----//
    Route::get('form/pesaing/add', 'addPesaing')->name('form/pesaing/add');
    Route::post('form/pesaing/save', 'savePesaing')->name('form/pesaing/save');
    Route::get('pesaing/show', 'showPesaing')->name('form/pesaing/show');
    Route::get('form/pesaing/edit/{id}', 'editPesaing')->name('form/pesaing/edit');
    Route::put('pesaing/{pesaing}', 'updatePesaing')->name('pesaing/update');
    Route::delete('pesaing/{pesaing}', 'deletePesaing')->name('pesaing/delete');

    //------Target Audience------//
    Route::get('form/target/add', 'addTarget')->name('form/target/add');
    Route::post('form/target/save', 'saveTarget')->name('form/target/save');
    Route::get('target/show', 'showTarget')->name('form/target/show');
    Route::get('form/target/edit/{id}', 'editTarget')->name('form/target/edit');
    Route::put('target/{target}', 'updateTarget')->name('target/update');
    Route::delete('target/{target}', 'deleteTarget')->name('target/delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
