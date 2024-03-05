<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    // public function cetakPengajuan()
    // {
    //     $pengajuan = Pengajuan::all();
    //     return view('pengajuan.lapdiv', compact('pengajuan'));
    // }

    public function cetakPembelian()
    {
        $pembelian = pembelian::all();
        return view('pembelian.laporan', compact('pembelian'));
    }
}
