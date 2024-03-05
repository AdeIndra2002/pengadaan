<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembatalan extends Model
{
    use HasFactory;

    protected $table = 'pembatalans';

    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'divisiId');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuanId');
    }
}
