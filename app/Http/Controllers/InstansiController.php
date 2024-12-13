<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;

class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::all();
        return view('sna.master-instansi', compact('instansi'));
    }

    public function create()
    {
        return view('instansi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'instansi_jenis' => 'required|integer',
            'instansi_nama' => 'required|string|max:100',
            'instansi_alamat' => 'required|string|max:250',
        ]);

        Instansi::create($request->all());
        return redirect()->route('sna.master-instansi')->with('success', 'Instansi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $instansi = Instansi::findOrFail($id);
        return view('instansi.show', compact('instansi'));
    }

    public function edit($id)
    {
        $instansi = Instansi::findOrFail($id);
        return view('instansi.edit', compact('instansi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'instansi_jenis' => 'required|integer',
            'instansi_nama' => 'required|string|max:100',
            'instansi_alamat' => 'required|string|max:250',
        ]);

        $instansi = Instansi::findOrFail($id);
        $instansi->update($request->all());
        return redirect()->route('sna.master-instansi')->with('success', 'Instansi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();
        return redirect()->route('sna.master-instansi')->with('success', 'Instansi berhasil dihapus!');
    }
}