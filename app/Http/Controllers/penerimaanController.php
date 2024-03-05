<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\divisi;
use App\Models\kategori;
use App\Models\penerimaan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;


class penerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_penerimaan = penerimaan::orderBy('id', 'desc')->get();
        $pengajuans = Pengajuan::all();
        return view('penerimaan.penerimaan', compact('view_penerimaan', 'pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $kategoris = kategori::all();
        $pengajuans = Pengajuan::all(); // Perbaiki nama variabel dari $pengajuan menjadi $pengajuans
        return view('penerimaan.create', compact('barangs', 'kategoris', 'pengajuans')); // Perbaiki variabel yang dikirimkan ke view menjadi 'pengajuans'
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggalPenerimaan' => 'required|date',
            'jumlahPenerimaan' => 'required|numeric',
            'barangId' => 'required|exists:barangs,id',
            'pengajuanId' => 'required|exists:pengajuans,id',
            'kategoriId' => 'required|exists:kategoris,id'
        ]);

        // Ambil informasi pengajuan
        $pengajuan = Pengajuan::findOrFail($validatedData['pengajuanId']);

        // Simpan data penerimaan
        $penerimaan = Penerimaan::create([
            'tanggalPenerimaan' => $validatedData['tanggalPenerimaan'],
            'jumlahPenerimaan' => $validatedData['jumlahPenerimaan'],
            'pengajuanId' => $validatedData['pengajuanId'],
            'barangId' => $validatedData['barangId'],
            'kategoriId' => $validatedData['kategoriId'],
            'divisiId' => $pengajuan->divisiId // Ambil divisiId dari pengajuan
            // Tambahkan kolom lain yang perlu disimpan
        ]);

        // Tambahkan stok barang terkait
        $barang = Barang::findOrFail($penerimaan->barangId);
        $barang->stok += $validatedData['jumlahPenerimaan'];
        $barang->save();

        return redirect()->route('penerimaan.index')->with('success', 'Data penerimaan berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = penerimaan::findOrFail($id);

        return view('penerimaan.show', compact('data'));
    }


    public function cetakPenerimaan(Request $request)
    {
        $pengajuans = Pengajuan::all();
        $view_penerimaan = penerimaan::orderBy('id', 'desc')->get(); // Menggunakan $view_pengajuan
        $pengajuanId = $request->input('namaPengajuan');

        // Filter pengajuan berdasarkan divisi yang dipilih
        $view_penerimaan = penerimaan::when($pengajuanId, function ($query, $pengajuanId) {
            $query->whereHas('pengajuan', function ($query) use ($pengajuanId) {
                $query->where('id', $pengajuanId);
            });
        })->get();

        return view('penerimaan.laporan', compact('view_penerimaan', 'pengajuans')); // Menggunakan $view_pengajuan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Penerimaan::findOrFail($id);
        $pengajuans = Pengajuan::all(); // Anda perlu mengganti Pengajuan dengan model yang sesuai
        return view('penerimaan.edit', compact('data', 'pengajuans'));
    }

    /**
     * Proses pembaruan data penerimaan.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pengajuanId' => 'required|exists:pengajuans,id',
            'tanggalPenerimaan' => 'required|date',
            'jumlahPenerimaan' => 'required|numeric',
        ]);

        // Temukan data penerimaan yang akan diperbarui
        $penerimaan = Penerimaan::findOrFail($id);

        // Hitung selisih jumlah penerimaan baru dengan jumlah penerimaan sebelumnya
        $diffJumlahPenerimaan = $request->jumlahPenerimaan - $penerimaan->jumlahPenerimaan;

        // Perbarui data penerimaan
        $penerimaan->update($validatedData);

        // Perbarui stok barang terkait
        $barang = Barang::findOrFail($penerimaan->barang->id); // Ubah ke id barang yang terkait dengan penerimaan
        $barang->stok += $diffJumlahPenerimaan;
        $barang->save();

        return redirect()->route('penerimaan.index')->with('success', 'Data penerimaan berhasil diperbarui.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penerimaan = penerimaan::findOrFail($id);

        $barang = Barang::findOrFail($penerimaan->barangId);
        $barang->stok -= $penerimaan->jumlahPenerimaan;
        $barang->save();

        // Hapus data pengajuan
        $penerimaan->delete();
        return redirect()->route('penerimaan.index');
    }
}
