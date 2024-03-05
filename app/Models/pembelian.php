<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';

    protected $fillable = [
        'tanggalPembelian',
        'namaBarang',
        'jumlahBarang',
        'totalHarga',
        'supplierId',
        'gambar'
    ];

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplierId');
    }
}
