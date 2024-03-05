<?php

namespace App\Http\Controllers;

use App\Models\pembatalan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class pembatalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_pembatalan = pembatalan::orderBy('id', 'desc')->get();
        return view('pembatalan.pembatalan', compact('view_pembatalan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuans = Pengajuan::all();
        return view('pembatalan.create', compact('pengajuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggalPembatalan' => 'required|date',
            'keteranganPembatalan' => 'required|string',
            'pengajuanId' => 'required|exists:pengajuans,id',
        ]);

        // Ambil informasi pengajuan
        $pengajuan = Pengajuan::findOrFail($validatedData['pengajuanId']);

        // Simpan data Pembatalan
        $pembatalan = pembatalan::create([
            'tanggalPembatalan' => $validatedData['tanggalPembatalan'],
            'keteranganPembatalan' => $validatedData['keteranganPembatalan'],
            'pengajuanId' => $validatedData['pengajuanId'],
            'divisiId' => $pengajuan->divisiId, // Ambil divisiId dari pengajuan
            // Tambahkan kolom lain yang perlu disimpan
        ]);

        return redirect()->route('pembatalan.index')->with('success', 'Data Pembatalan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = pembatalan::findOrFail($id);

        return view('pembatalan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pembatalan::findOrFail($id);
        $pengajuans = Pengajuan::all();
        return view('pembatalan.edit', compact('data', 'pengajuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggalPembatalan' => 'required|date',
            'keteranganPembatalan' => 'required|string',
            'pengajuanId' => 'required|exists:pengajuans,id',
        ]);

        // Ambil data Pembatalan yang akan diupdate
        $pembatalan = pembatalan::findOrFail($id);

        // Ambil informasi pengajuan
        $pengajuan = Pengajuan::findOrFail($validatedData['pengajuanId']);


        // Update data Pembatalan
        $pembatalan->update([
            'tanggalPembatalan' => $validatedData['tanggalPembatalan'],
            'keteranganPembatalan' => $validatedData['keteranganPembatalan'],
            'pengajuanId' => $validatedData['pengajuanId'],
            'kategoriId' => $pengajuan->kategoriId, // Ambil kategoriId dari pengajuan
            'divisiId' => $pengajuan->divisiId, // Ambil divisiId dari pengajuan
            // Tambahkan kolom lain yang perlu disimpan
        ]);

        return redirect()->route('pembatalan.index')->with('success', 'Data Pembatalan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembatalan = pembatalan::where('id', $id)->first();
        $pembatalan->delete();
        return redirect()->route('pembatalan.index');
    }
}
