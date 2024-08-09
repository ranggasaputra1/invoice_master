<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::get();
        return view('laporan.index', compact('laporans'));
    }

    public function store(Request $request)
    {
        // Dapatkan bulan dan tahun saat ini
        $currentYear = now()->year;
        $currentMonth = now()->month;
    
        // Loop untuk setiap bulan dari awal tahun hingga bulan saat ini
        for ($month = 1; $month <= $currentMonth; $month++) {
            $startDate = \Carbon\Carbon::create($currentYear, $month, 1);
            $taxDue = $startDate->format('Y-m-d'); // Tanggal 1 bulan ini
    
            // Periksa apakah laporan untuk bulan ini sudah ada
            $existingReport = Laporan::where('tax_due', $taxDue)->first();
    
            if ($existingReport) {
                // Jika laporan sudah ada untuk bulan ini
                if ($startDate->month === $currentMonth && now()->isSameMonth($startDate)) {
                    // Update laporan jika bulan saat ini
                    $existingReport->amount_paid = (new Laporan())->amountPaid($month, $currentYear);
                    $existingReport->ppn_in = $existingReport->calculatePPNIn($month, $currentYear); // Menghitung PPN In
                    $existingReport->ppn_out = $existingReport->calculatePPNOut($month, $currentYear); // Menghitung PPN Out
                    $existingReport->status = $this->calculateStatus($existingReport->ppn_out, $existingReport->ppn_in);
                    $existingReport->total = $existingReport->ppn_out - $existingReport->ppn_in; // Menghitung PPN Out
                    $existingReport->save();
                }
                continue;
            }
    
            // Jika laporan belum ada untuk bulan ini
            $laporan = new Laporan();
            $laporan->amount_paid = (new Laporan())->amountPaid($month, $currentYear);
            $laporan->tax_due = $taxDue;
            $laporan->ppn_in = $laporan->calculatePPNIn($month, $currentYear); // Menghitung PPN In
            $laporan->ppn_out = $laporan->calculatePPNOut($month, $currentYear); // Menghitung PPN Out
            $laporan->total = $laporan->ppn_out - $laporan->ppn_in; // Menghitung PPN Out
            $laporan->status = $this->calculateStatus($laporan->ppn_out, $laporan->ppn_in);
            $laporan->save();
        }
    
        return redirect()->back()->with('success', 'Laporan berhasil disimpan.');
    }
    
    
    
    private function calculateStatus($ppnOut, $ppnIn)
    {
        // Implementasikan logika untuk menentukan status
        $difference = $ppnOut - $ppnIn;
        if ($difference < 0) {
            return 'Kurang Bayar';
        } elseif ($difference > 0) {
            return 'Lebih Setor';
        } else {
            return 'Lunas';
        }
    }

}
