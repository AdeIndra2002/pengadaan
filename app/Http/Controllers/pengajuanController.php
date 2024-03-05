<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pengajuan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{

    public function index()
    {
        $view_pengajuan = Pengajuan::orderBy('id', 'desc')->get();
        $divisis = Divisi::all();
        return view('pengajuan.pengajuan', compact('view_pengajuan', 'divisis'));
    }

    public function create()
    {
        $divisis = Divisi::all();

        return view('pengajuan.create', compact('divisis'));
    }

    public function store(Request $request)
    {
        // Validasi data pengajuan
        $validatedData = $request->validate([
            'namaPengajuan' => 'required',
            'tanggalPengajuan' => 'required|date',
            'barang' => 'required|string',
            'divisiId' => 'required|exists:divisis,id',
        ]);

        // Simpan data pengajuan
        Pengajuan::create($validatedData);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.show', compact('pengajuan'));
    }

    public function cetakPengajuan(Request $request)
    {
        $divisis = Divisi::all();
        $view_pengajuan = Pengajuan::orderBy('id', 'desc')->get(); // Menggunakan $view_pengajuan
        $selected_division = $request->input('selected_division');
        $divisiId = $request->input('division');

        // Filter pengajuan berdasarkan divisi yang dipilih
        $view_pengajuan = Pengajuan::when($divisiId, function ($query, $divisiId) {
            $query->whereHas('divisi', function ($query) use ($divisiId) {
                $query->where('id', $divisiId);
            });
        })->get();

        return view('pengajuan.lapdiv', compact('view_pengajuan', 'divisis', 'selected_division')); // Menggunakan $view_pengajuan
    }




    public function generate($id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Mengambil data pengajuan berdasarkan ID
        return view('pengajuan.surat', compact('pengajuan'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $divisis = Divisi::all();
        return view('pengajuan.edit', compact('pengajuan', 'divisis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data pengajuan
        $validatedData = $request->validate([
            'namaPengajuan' => 'required',
            'tanggalPengajuan' => 'required|date',
            'barang' => 'required|string',
            'divisiId' => 'required|exists:divisis,id',
        ]);

        // Ambil data pengajuan yang akan diupdate
        $pengajuan = Pengajuan::findOrFail($id);

        // Update data pengajuan
        $pengajuan->update($validatedData);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajuan = pengajuan::where('id', $id)->first();
        $pengajuan->delete();
        return redirect()->route('pengajuan.index');
    }
}
