<?php

namespace App\Http\Controllers;

use App\Models\KategoriAlat;
use Illuminate\Http\Request;

class KategoriAlatController extends Controller
{
    public function index()
    {
        $kategorialat = KategoriAlat::paginate(10);
        return view('sna.master-kategori-alat', compact('kategorialat'));
    }
    public function create()
    {
        return view('form.create.add_kategori_alat');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_alat_nama' => 'required|string|max:255',
        ]);
        KategoriAlat::create($validatedData);
        return redirect()->route('kategori_alat.index')->with('success', 'Kategori Alat berhasil ditambahkan');
    }
    public function show($id)
    {
        $kategorialat = KategoriAlat::findOrFail($id);
        return view('kategori_alat.show', compact('kategorialat'));
    }

    public function edit($id)
    {
        $kategorialat = KategoriAlat::findOrFail($id);
        return view('form.edit.edit_kategori_alat', compact('kategorialat'));
    }


    public function update(Request $request, $id)
    {
        $kategorialat = KategoriAlat::findOrFail($id);

        $validatedData = $request->validate([
            'kategori_alat_nama' => 'required|string|max:255',
        ]);

        $kategorialat->update($validatedData);


        return redirect()->route('kategori_alat.index')->with('success', 'Kategori Alat berhasil diperbarui');
    }


    public function destroy($id)
    {
        // Find the KategoriAlat by ID
        $kategorialat = KategoriAlat::findOrFail($id);

        // Delete the KategoriAlat
        $kategorialat->delete();

        // Redirect with success message
        return redirect()->route('kategori_alat.index')->with('success', 'Kategori Alat berhasil dihapus');
    }
}