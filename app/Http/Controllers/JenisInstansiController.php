<?php

namespace App\Http\Controllers;

use App\Models\JenisInstansi;
use Illuminate\Http\Request;

class JenisInstansiController extends Controller
{
    public function index()
    {
        // Retrieve all JenisInstansi records
        $jenisinstansi = JenisInstansi::paginate(10);
        return view('sna.master-jenis-instansi', compact('jenisinstansi'));
    }

    public function create()
    {
        // Show the form for creating a new JenisInstansi
        return view('form.create.add_jenis_instansi');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_instansi_nama' => 'required|string|max:100',
        ]);

        JenisInstansi::create($validatedData);
        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil ditambahkan!');
    }

    public function show($jenis_instansi_id)
    {
        $jenisinstansi = JenisInstansi::findOrFail($jenis_instansi_id);
        return view('jenisinstansi.show', compact('jenisinstansi'));
    }

    public function edit($jenis_instansi_id)
    {
        $jenisinstansi = JenisInstansi::findOrFail($jenis_instansi_id);
        return view('form.edit.edit_jenis_instansi', compact('jenisinstansi'));
    }

    public function update(Request $request, $jenis_instansi_id)
    {
        $jenisinstansi = JenisInstansi::findOrFail($jenis_instansi_id);

        $validatedData = $request->validate([
            'jenis_instansi_nama' => 'required|string|max:100',
        ]);

        $jenisinstansi->update($validatedData);
        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil diperbarui!');
    }

    public function destroy($jenis_instansi_id)
    {
        // Find the JenisInstansi by ID and delete it
        $jenisinstansi = JenisInstansi::findOrFail($jenis_instansi_id);
        $jenisinstansi->delete();

        return redirect()->route('jenis_instansi.index')->with('success', 'Jenis Instansi berhasil dihapus!');
    }
}
