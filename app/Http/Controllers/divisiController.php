<?php

namespace App\Http\Controllers;

use App\Models\divisi;
use Illuminate\Http\Request;

class divisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisis = divisi::orderBy('id', 'ASC')->get();

        return view('divisi.divisi', compact('divisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'divisi' => 'required',
            'kepalaDivisi' => 'required'
        ]);

        $divisi = new divisi();
        $divisi->divisi = $request->divisi;
        $divisi->kepalaDivisi = $request->kepalaDivisi;

        $divisi->save();

        return redirect()->route('divisi.index');
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
        $data = divisi::where('id', $id)->first();
        return view('divisi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'divisi' => 'required',
            'kepalaDivisi' => 'required'
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->divisi = $request->divisi;
        $divisi->kepalaDivisi = $request->kepalaDivisi;

        $divisi->save();

        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $divisi = divisi::where('id', $id)->first();
        $divisi->delete();
        return redirect()->route('divisi.index');
    }
}
