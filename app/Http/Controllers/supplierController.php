<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = supplier::orderBy('id', 'ASC')->get();
        return view('supplier.supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaSupplier' => 'required',
            'nomorHp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = new supplier(); // Assuming your model name is Supplier
        $supplier->namaSupplier = $request->namaSupplier;
        $supplier->nomorHp = $request->nomorHp;
        $supplier->alamat = $request->alamat;

        $supplier->save();

        return redirect()->route('supplier.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = supplier::where('id', $id)->first();
        return view('supplier.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'namaSupplier' => 'required',
            'nomorHp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = supplier::findOrFail($id);
        $supplier->namaSupplier = $request->namaSupplier;
        $supplier->nomorHp = $request->nomorHp;
        $supplier->alamat = $request->alamat;

        $supplier->save();

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = supplier::where('id', $id)->first();
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
