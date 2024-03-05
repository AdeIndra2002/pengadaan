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
        //     CREATE VIEW view_Supplier AS
        //     SELECT
        //         suppliers.id,
        //         suppliers.namaSupplier,
        //         suppliers.nomorHp,
        //         suppliers.alamat,
        //         barangs.barang,
        //         suppliers.created_at,
        //         suppliers.updated_at
        //     FROM suppliers
        //     INNER JOIN barangs on suppliers.barangId = barangs.id
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
