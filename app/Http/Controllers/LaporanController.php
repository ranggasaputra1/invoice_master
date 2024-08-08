<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::get();

        // Tambahkan perhitungan kurang bayar atau lebih setor
        foreach ($laporans as $laporan) {
            $laporan->difference = $laporan->amount_paid - $laporan->tax_due;
            $laporan->status = $laporan->difference < 0 ? 'Kurang Bayar' : 'Lebih Setor';
        }

        return view('laporan.index', compact('laporans'));
    }
}
