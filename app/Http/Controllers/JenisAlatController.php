<?php

namespace App\Http\Controllers;

use App\Models\JenisAlat;
use Illuminate\Http\Request;

class JenisAlatController extends Controller
{
    public function index()
    {
        $jenisalat = JenisAlat::paginate(10);
        return view('sna.master-jenis-alat', compact('jenisalat'));
    }
    public function create()
    {
        return view('form.create.add_jenis_alat');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_alat_nama' => 'required|string|max:50',
        ]);
        JenisAlat::create($validatedData);
        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil ditambahkan!');
    }

    public function show($jenis_alat_id)
    {
        $jenisalat = JenisAlat::findOrFail($jenis_alat_id);
        return view('jenis_alat.show', compact('jenisalat'));
    }

    public function edit($jenis_alat_id)
    {
        // Find the JenisAlat by id for editing
        $jenisalat = JenisAlat::findOrFail($jenis_alat_id);
        return view('form.edit.edit_jenis_alat', compact('jenisalat'));
    }

    public function update(Request $request, $jenis_alat_id)
    {
        $jenisalat = JenisAlat::findOrFail($jenis_alat_id);
        // Validate the request
        $validatedData = $request->validate([
            'jenis_alat_nama' => 'required|string|max:255',
        ]);

        // Find the JenisAlat by id and update it
        $jenisalat->update($validatedData);

        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil diperbarui!');
    }

    public function destroy($jenis_alat_id)
    {
        // Find the JenisAlat by id and delete it
        $jenisalat = JenisAlat::findOrFail($jenis_alat_id);
        $jenisalat->delete();

        return redirect()->route('jenis_alat.index')->with('success', 'Jenis Alat berhasil dihapus!');
    }
}