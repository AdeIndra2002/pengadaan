<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = barang::orderBy('id', 'ASC')->get();

        return view('barang.barang', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang' => 'required',
            'stok' => 'required'
        ]);

        $barang = new barang();
        $barang->barang = $request->barang;
        $barang->stok = $request->stok;

        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = barang::where('id', $id)->first();
        return view('barang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang' => 'required',
            'stok' => 'required'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->barang = $request->barang;
        $barang->stok = $request->stok;

        $barang->save();

        return redirect()->route('barang.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = barang::where('id', $id)->first();
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
