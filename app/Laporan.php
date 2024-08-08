<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function up()
    {
        Schema::create('tax_reports', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_paid', 15, 2); // Jumlah yang dibayar
            $table->decimal('tax_due', 15, 2);     // Pajak yang seharusnya dibayar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_reports');
    }
}
