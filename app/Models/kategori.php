<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $guarded = ['id'];

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function penerimaan()
    {
        return $this->hasMany(penerimaan::class);
    }

    public function pembatalan()
    {
        return $this->hasMany(pembatalan::class);
    }
}
