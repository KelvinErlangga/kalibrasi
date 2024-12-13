<?php

namespace App\Http\Controllers;

use App\Models\JenisInstansi;
use Illuminate\Http\Request;

class JenisInstansiController extends Controller
{
    public function index()
    {
        // Retrieve all JenisInstansi records
        $jenisInstansi = JenisInstansi::all();
        return view('sna.master-jenis-instansi', compact('jenisInstansi'));
    }

    public function create()
    {
        // Show the form for creating a new JenisInstansi
        return view('jenis_instansi.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'jenis_instansi_nama' => 'required|string|max:100',
        ]);

        // Create a new JenisInstansi record
        JenisInstansi::create([
            'jenis_instansi_nama' => $request->jenis_instansi_nama,
        ]);

        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Find the JenisInstansi by ID
        $jenisInstansi = JenisInstansi::findOrFail($id);
        return view('jenis_instansi.show', compact('jenisInstansi'));
    }

    public function edit($id)
    {
        // Find the JenisInstansi by ID for editing
        $jenisInstansi = JenisInstansi::findOrFail($id);
        return view('jenis_instansi.edit', compact('jenisInstansi'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'jenis_instansi_nama' => 'required|string|max:100',
        ]);

        // Find the JenisInstansi by ID and update it
        $jenisInstansi = JenisInstansi::findOrFail($id);
        $jenisInstansi->update([
            'jenis_instansi_nama' => $request->jenis_instansi_nama,
        ]);

        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Find the JenisInstansi by ID and delete it
        $jenisInstansi = JenisInstansi::findOrFail($id);
        $jenisInstansi->delete();

        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil dihapus!');
    }
}