<?php

namespace App\Http\Controllers;

use App\Models\KategoriAlat;
use Illuminate\Http\Request;

class KategoriAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all KategoriAlat records
        $kategoriAlats = KategoriAlat::all();

        // Return the view with the data
        return view('sna.master-kategori-alat', compact('kategoriAlats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new KategoriAlat
        return view('kategoriAlat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'kategori_alat_nama' => 'required|string|max:255',
        ]);

        // Create a new KategoriAlat record
        KategoriAlat::create([
            'kategori_alat_nama' => $request->kategori_alat_nama,
        ]);

        // Redirect with success message
        return redirect()->route('kategoriAlat.index')->with('success', 'Kategori Alat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the KategoriAlat by ID
        $kategoriAlat = KategoriAlat::findOrFail($id);

        // Return the view with the specific KategoriAlat
        return view('kategoriAlat.show', compact('kategoriAlat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the KategoriAlat by ID
        $kategoriAlat = KategoriAlat::findOrFail($id);

        // Return the edit view with the KategoriAlat data
        return view('kategoriAlat.edit', compact('kategoriAlat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'kategori_alat_nama' => 'required|string|max:255',
        ]);

        // Find the KategoriAlat by ID
        $kategoriAlat = KategoriAlat::findOrFail($id);

        // Update the KategoriAlat data
        $kategoriAlat->update([
            'kategori_alat_nama' => $request->kategori_alat_nama,
        ]);

        // Redirect with success message
        return redirect()->route('kategoriAlat.index')->with('success', 'Kategori Alat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the KategoriAlat by ID
        $kategoriAlat = KategoriAlat::findOrFail($id);

        // Delete the KategoriAlat
        $kategoriAlat->delete();

        // Redirect with success message
        return redirect()->route('kategoriAlat.index')->with('success', 'Kategori Alat berhasil dihapus');
    }
}
