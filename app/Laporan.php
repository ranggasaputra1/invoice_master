<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount_paid',
        'ppn_in',
        'ppn_out',
        'tax_due',
        'status'
    ];

    public function calculatePPNOut($month, $year)
    {
        // Hitung total PPN keluar dari invoice per bulan
        $total = DB::table('invoices')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('total');
        
        $ppnOut = $total + ($total * 11) / 100;

        return $ppnOut;
    }

    public function calculatePPNIn($month, $year)
    {
        // Hitung total PPN masuk dari tabel 'masukans' per bulan
        $total = DB::table('masukans')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('total');

        return $total; // Menghitung PPN Masuk
    }

    public function amountPaid($month, $year)
    {
        // Ambil total dari invoice yang relevan per bulan
        $total = DB::table('invoices')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('total');

        return $total; // Menghitung PPN 11%
    }

}
