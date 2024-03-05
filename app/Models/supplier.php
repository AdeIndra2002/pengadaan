<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    protected $stable = 'suppliers';

    protected $guarded = ['id'];

    public function pembelian()
    {
        return $this->hasMany(pembelian::class);
    }
}
