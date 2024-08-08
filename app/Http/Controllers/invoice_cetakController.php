<?php

namespace App\Http\Controllers;

use App\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class invoice_cetakController extends Controller
{

    public function index(){
        $invoice = Invoice::all();
    	return view('invoince.cetak',['invoice'=>$invoice]);
    }

    public function cetakPDF($id)
{
    // Ambil data invoice berdasarkan ID
    $invoice = Invoice::with(['customer', 'detail'])->findOrFail($id);

    // Buat PDF dari view
    $pdf = PDF::loadView('invoice.cetak', compact('invoice'));

    // Tampilkan PDF di browser
    return $pdf->stream('invoice_' . $id . '.pdf');
}

}
