<?php

namespace App\Http\Controllers;

use App\Models\JenisInstansi;
use Illuminate\Http\Request;
use App\Models\Instansi;

class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::with('jenisInstansi')->paginate(10);
        return view('sna.master-instansi', compact('instansi'));
    }

    public function create()
    {
        $instansiType = JenisInstansi::pluck('jenis_instansi_nama', 'jenis_instansi_id');
        return view('form.create.add_instansi', compact('instansiType'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'instansi_nama' => 'required|string|max:255|unique:instansi,instansi_nama',
            'instansi_alamat' => 'required|string|max:255',
            'instansi_jenis' => 'required|exists:jenis_instansi,jenis_instansi_id', // Validasi ID jenis instansi
        ]);

        Instansi::create($validatedData);
        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil ditambahkan!');
    }

    // Menampilkan detail instansi
    public function show($id)
    {
        $instansi = Instansi::findOrFail($id);
        return view('instansi.show', compact('instansi'));
    }

    // Form edit instansi
    public function edit($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansiType = JenisInstansi::pluck('jenis_instansi_nama', 'jenis_instansi_id');
        return view('form.edit.edit_instansi', compact('instansi', 'instansiType'));
    }

    public function update(Request $request, $id)
    {
        $instansi = Instansi::findOrFail($id);

        $validatedData = $request->validate([
            'instansi_nama' => 'required|string|max:255|unique:instansi,instansi_nama,' . $id,
            'instansi_jenis' => 'required|exists:jenis_instansi,jenis_instansi_id', // Validasi ID jenis instansi
            'instansi_alamat' => 'required|string|max:255',
        ]);

        $instansi->update($validatedData);
        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();

        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil dihapus!');
    }
}
