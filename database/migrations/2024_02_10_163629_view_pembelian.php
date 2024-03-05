<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::statement("
        //     CREATE VIEW view_pembelian AS
        //     SELECT
        //         pembelians.id,
        //         pembelians.tanggalPembelian,
        //         pembelians.namaBarang,
        //         pembelians.jumlahBarang,
        //         pembelians.totalHarga,
        //         suppliers.namaSupplier,
        //         suppliers.nomorHp,
        //         suppliers.alamat,
        //         pembelians.gambar,
        //         pembelians.created_at,
        //         pembelians.updated_at
        //     FROM pembelians
        //     INNER JOIN suppliers ON pembelians.supplierId = suppliers.id
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
