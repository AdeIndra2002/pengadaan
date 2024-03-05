<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\supplier;
use Barryvdh\DomPDF\PDF;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class pembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_pembelian = pembelian::orderBy('id', 'desc')->get();
        return view('pembelian.pembelian', compact('view_pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = supplier::all();

        return view('pembelian.create', compact('suppliers'));
    }


    public function upload(Request $request)
    {
        $path = 'laravel-cloudinary';
        $file = $request->file('gambar')->getClientOriginalName();

        $fileName = pathinfo($file, PATHINFO_FILENAME);

        $publicId = $fileName;
        $upload = Cloudinary::upload($request->file('gambar')->getRealPath(), [
            'folder' => $path,
            'public_id' => $publicId
        ]);

        return $upload;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggalPembelian' => 'required',
            'namaBarang' => 'required',
            'jumlahBarang' => 'required',
            'totalHarga' => 'required',
            'namaSupplier' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:10240'
        ]);

        $pembelian = new pembelian();
        $pembelian->tanggalPembelian = $request->tanggalPembelian;
        $pembelian->namaBarang = $request->namaBarang;
        $pembelian->jumlahBarang = $request->jumlahBarang;
        $pembelian->totalHarga = $request->totalHarga;
        $pembelian->supplierId = $request->namaSupplier;

        $upload = $this->upload($request);

        $pembelian->gambar = $upload->getSecurePath();
        $pembelian->save();

        return redirect()->route('pembelian.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('view_pembelian')
            ->select('*')
            ->where('id', $id)
            ->first();

        return view('pembelian.show', compact('data'));
    }

    public function cetakPembelian()
    {
        // $mpdf = new Mpdf();
        // $data = pembelian::orderBy('id', 'desc')->get();
        // $mpdf->WriteHTML(view("pembelian.laporan", ['view_pembelian' = $data]));
        // $mpdf->Output();

        // $view_pembelian = DB::table('view_pembelian')->select('*')->get();
        // $data = [
        //     'pembelian' => $view_pembelian,
        //     'tanggal' => date('d F Y'),
        //     'judul' => 'Laporan Data Sembako'
        // ];

        // $laporan = PDF::loadView('pembelian.laporan', $data)->setPaper('f4', 'landscape');
        // $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        // $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        // return $laporan->stream('laporan_'  . '.pdf');
        $pembelian = pembelian::all();
        return view('pembelian.laporan', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suppliers = supplier::all();
        $data = pembelian::findOrFail($id);
        return view('pembelian.edit', compact('data', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggalPembelian' => 'required',
            'namaBarang' => 'required',
            'jumlahBarang' => 'required',
            'totalHarga' => 'required',
            'namaSupplier' => 'required',
        ]);

        $pembelian = pembelian::findOrFail($id);
        $pembelian->tanggalPembelian = $request->tanggalPembelian;
        $pembelian->namaBarang = $request->namaBarang;
        $pembelian->jumlahBarang = $request->jumlahBarang;
        $pembelian->totalHarga = $request->totalHarga;
        $pembelian->supplierId = $request->namaSupplier;

        // Memeriksa apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            ]);

            // Upload gambar baru
            $upload = $this->upload($request);
            $pembelian->gambar = $upload->getSecurePath();
        }

        $pembelian->save();

        return redirect()->route('pembelian.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index');
    }
}
