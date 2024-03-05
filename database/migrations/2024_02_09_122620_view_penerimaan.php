<?php

use Illuminate\Support\Facades\DB;
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
        // DB::statement("
        //     CREATE VIEW view_penerimaan AS
        //     SELECT
        //         pengajuans.id,
        //         pengajuans.namaPengajuan,
        //         pengajuans.tanggalPengajuan,
        //         pengajuans.barang AS barang_pengajuan,
        //         barangs.barang,
        //         barangs.stok AS stok_barang,
        //         kategoris.kategori,
        //         divisis.divisi,
        //         divisis.kepalaDivisi,
        //         penerimaans.id AS penerimaan_id,
        //         penerimaans.tanggalPenerimaan,
        //         penerimaans.jumlahPenerimaan,
        //         penerimaans.created_at,
        //         penerimaans.updated_at
        //     FROM penerimaans
        //     INNER JOIN pengajuans ON penerimaans.pengajuanId = pengajuans.id
        //     INNER JOIN barangs ON penerimaans.barangId = barangs.id
        //     INNER JOIN kategoris ON penerimaans.kategoriId = kategoris.id
        //     INNER JOIN divisis ON pengajuans.divisiId = divisis.id
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_penerimaan");
    }
};
