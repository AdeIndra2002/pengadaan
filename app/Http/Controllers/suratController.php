<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class suratController extends Controller
{
    public function generateLaporan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Mengambil data pengajuan berdasarkan ID
        return view('pengajuan.surat', compact('pengajuan'));
    }
}
