<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = kategori::orderBy('id', 'ASC')->get();

        return view('kategori.kategori', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required'
        ]);

        $kategori = new kategori();
        $kategori->kategori = $request->kategori;

        $kategori->save();

        return redirect()->route('kategori.index');
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
        $data = kategori::where('id', $id)->first();
        return view('kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori' => 'required'
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->kategori = $request->kategori;

        $kategori->save();

        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori::where('id', $id)->first();
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
