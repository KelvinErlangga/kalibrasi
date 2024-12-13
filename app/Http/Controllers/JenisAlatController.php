<?php

namespace App\Http\Controllers;

use App\Models\JenisAlat;
use Illuminate\Http\Request;

class JenisAlatController extends Controller
{
    public function index()
    {
        // Retrieve all JenisAlat records
        $jenisAlat = JenisAlat::all();
        return view('sna.master-jenis-alat', compact('jenisAlat'));
    }

    public function create()
    {
        // Show form for creating new JenisAlat
        return view('jenis_alat.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'jenis_alat_nama' => 'required|string|max:50',
        ]);

        // Create new JenisAlat record
        JenisAlat::create($request->only('jenis_alat_nama'));

        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Find the JenisAlat by id
        $jenisAlat = JenisAlat::findOrFail($id);
        return view('jenis_alat.show', compact('jenisAlat'));
    }

    public function edit($id)
    {
        // Find the JenisAlat by id for editing
        $jenisAlat = JenisAlat::findOrFail($id);
        return view('jenis_alat.edit', compact('jenisAlat'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'jenis_alat_nama' => 'required|string|max:255',
        ]);

        // Find the JenisAlat by id and update it
        $jenisAlat = JenisAlat::findOrFail($id);
        $jenisAlat->update($request->only('jenis_alat_nama'));

        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Find the JenisAlat by id and delete it
        $jenisAlat = JenisAlat::findOrFail($id);
        $jenisAlat->delete();

        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil dihapus!');
    }
}