<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    use HasFactory;

    protected $table = 'penerimaans';

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'barangId');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategoriId');
    }

    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'divisiId');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuanId');
    }
}
