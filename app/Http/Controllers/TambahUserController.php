<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userkalibrasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TambahUserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = Userkalibrasi::all();
        return view('users.index', compact('users'));
    }

    // Form tambah pengguna
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'user_username' => 'required|string|max:255|unique:userkalibrasi',
            'user_password' => 'required|string|min:6',
            'user_nama' => 'required|string|max:255',
        ]);

        Userkalibrasi::create([
            'user_username' => $request->input('user_username'),
            'user_password' => $request->input('user_password'), // Jika ingin enkripsi, gunakan Hash::make()
            'user_nama' => $request->input('user_nama'),
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    // Menampilkan detail pengguna
    public function show($id)
    {
        $user = Userkalibrasi::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Form edit pengguna
    public function edit($id)
    {
        $user = Userkalibrasi::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update data pengguna
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_username' => 'required|string|max:255|unique:userkalibrasi,user_username,' . $id,
            'user_password' => 'nullable|string|min:2',
            'user_nama' => 'required|string|max:255',
        ]);

        $user = Userkalibrasi::findOrFail($id);

        $data = [
            'user_username' => $request->input('user_username'),
            'user_nama' => $request->input('user_nama'),
        ];

        if ($request->filled('user_password')) {
            $data['user_password'] = $request->input('user_password'); 
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        $user = Userkalibrasi::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }

    // Login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:2|max:255',
        ]);

        $user = Userkalibrasi::where('user_username', $request->input('nama'))->first();

        if ($user && $request->input('password') === $user->user_password) {
            Auth::login($user);
            session(['user_name' => $user->user_nama]);

            $remember = $request->has('remember');

            return redirect()->intended('/');
        } else {
            return back()->withErrors(['nama' => 'Nama atau password salah.']);
        }
    }
}
