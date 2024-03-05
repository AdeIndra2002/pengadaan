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
        DB::statement("
            CREATE VIEW view_pembatalan AS
            SELECT
                pengajuans.id,
                pengajuans.namaPengajuan,
                pengajuans.tanggalPengajuan,
                pengajuans.barang,
                divisis.divisi,
                divisis.kepalaDivisi,
                pembatalans.id AS pembatalan_id,
                pembatalans.tanggalPembatalan,
                pembatalans.keteranganPembatalan,
                pembatalans.created_at,
                pembatalans.updated_at
            FROM pembatalans
            INNER JOIN pengajuans ON pembatalans.pengajuanId = pengajuans.id
            INNER JOIN divisis ON pengajuans.divisiId = divisis.id
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_pembatalan");
    }
};
