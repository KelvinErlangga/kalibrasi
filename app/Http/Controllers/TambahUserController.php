<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userkalibrasi;
class TambahUserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $user = Userkalibrasi::paginate(10);
        return view('sna.master-tambah-user', compact('user'));
    }

    // Form tambah pengguna
    public function create()
    {
        $userTypes = ['admin', 'superadmin', 'petugas']; // Tipe user yang bisa dipilih
        return view('form.create.add_user', compact('userTypes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'user_username' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:user',
                    'regex:/^\S+$/',
                ],
                'user_password' => 'required|string|min:6',
                'user_nama' => 'required|string|max:255',
                'user_akses' => 'required|string',
            ],
            [
                'user_username.regex' => 'Username tidak boleh mengandung spasi.',
                'user_password.min' => 'Password harus minimal 6 karakter.', // Pesan kesalahan
            ]
        );

        Userkalibrasi::create($validatedData);
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }


    public function show($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id); // Menggunakan user_id untuk mencari
        return view('user.show', compact('user'));
    }

    // Form edit pengguna
    public function edit($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id);
        $userTypes = ['admin', 'superadmin', 'petugas']; // Definisikan tipe user yang bisa dipilih

        // Pastikan untuk mengirimkan kedua variabel ke view
        return view('form.edit.edit_user', compact('user', 'userTypes'));
    }

    public function update(Request $request, $user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id);

        $validatedData = $request->validate([
            'user_username' => 'required|string|max:255|unique:user,user_username,' . $user_id . ',user_id',
            'user_nama' => 'required|string|max:255',
            'user_akses' => 'required|string|in:admin,superadmin,petugas',
        ]);

        // Cek apakah password diisi, jika tidak gunakan password lama
        if ($request->filled('user_password')) {
            $validatedData['user_password'] = $request->user_password; // Simpan password tanpa hashing
        } else {
            $validatedData['user_password'] = $user->user_password; // Tetap gunakan password lama
        }

        // Update pengguna dengan data yang telah divalidasi
        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    public function hapus($user_id)
    {
        $user = Userkalibrasi::findOrFail($user_id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}