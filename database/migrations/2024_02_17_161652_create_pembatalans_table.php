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
        Schema::create('pembatalans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalPembatalan');
            $table->string('keteranganPembatalan');
            $table->foreignId('pengajuanId');
            $table->foreignId('divisiId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembatalans');
    }
};
