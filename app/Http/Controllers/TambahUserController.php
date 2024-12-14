<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userkalibrasi;
use Illuminate\Support\Facades\Hash;

class TambahUserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $user = Userkalibrasi::paginate(7);
        return view('sna.master-tambah-user', compact('user'));
    }

    // Form tambah pengguna
    public function create()
    {
        $userTypes = ['admin', 'petugas']; // Tipe user yang bisa dipilih
        return view('form.add_user', compact('userTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_username' => 'required|string|max:255|unique:userkalibrasi',
            'user_password' => 'required|string|min:6',
            'user_nama' => 'required|string|max:255',
            'user_type' => 'required|string', // Validasi untuk jenis user
        ]);

        Userkalibrasi::create([
            'user_username' => $request->input('user_username'),
            'user_password' => Hash::make($request->input('user_password')),
            'user_nama' => $request->input('user_nama'),
            'user_type' => $request->input('user_type'), // Menyimpan jenis user
        ]);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }


    // Menampilkan detail pengguna
    public function show($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id); // Menggunakan user_id untuk mencari
        return view('user.show', compact('user'));
    }

    // Form edit pengguna
    public function edit($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id);
        return view('user.edit', compact('user'));
    }

    // Update data pengguna
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'user_username' => 'required|string|max:255|unique:userkalibrasi,user_username,' . $user_id,
            'user_password' => 'nullable|string|min:6',
            'user_nama' => 'required|string|max:255',
        ]);

        $user = Userkalibrasi::findOrFail($user_id);

        $data = [
            'user_username' => $request->input('user_username'),
            'user_nama' => $request->input('user_nama'),
        ];

        if ($request->filled('user_password')) {
            $data['user_password'] = Hash::make($request->input('user_password')); // Enkripsi password
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    // Hapus pengguna
    public function hapus($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}