<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrakSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::all();
        return view('kontrak_sewa.index', compact('kontrakSewa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::all();
        return view('kontrak_sewa.index', compact('kontrakSewa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::all();
        return view('kontrak_sewa.index', compact('kontrakSewa'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::findOrFail($id);
        return view('kontrak_sewa.show', compact('kontrakSewa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::findOrFail($id);
        return view('kontrak_sewa.edit', compact('kontrakSewa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::findOrFail($id);
        $kontrakSewa->update($request->all());
        return redirect()->route('kontrak_sewa.index')->with('success', 'Kontrak sewa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kontrakSewa = \App\Models\KontrakSewa::findOrFail($id);
        $kontrakSewa->delete();
        return redirect()->route('kontrak_sewa.index')->with('success', 'Kontrak sewa berhasil dihapus.');  
    }
}
