<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    use HasFactory;

    protected $table = 'divisis';

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
