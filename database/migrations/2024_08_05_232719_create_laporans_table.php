<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_paid', 15, 2); // Jumlah yang dibayar
            $table->decimal('ppn_in', 15, 2); // Jumlah yang dibayar
            $table->decimal('ppn_out', 15, 2); // Jumlah yang dibayar
            $table->decimal('total', 15, 2); // Jumlah yang dibayar
            $table->string('status'); // Jumlah yang dibayar
            $table->date('tax_due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
