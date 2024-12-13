<?php
namespace App\Http\Controllers;

use App\Models\Userkalibrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk memproses login
    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255', // Validasi nama pengguna
            'password' => 'required|string|min:2|max:255', // Validasi panjang password
        ]);

        // Mencari user berdasarkan nama pengguna
        $user = Userkalibrasi::where('user_username', $request->input('nama'))->first();

        // Jika user ditemukan dan password cocok
        if ($user && $request->input('password') === $user->user_password) {
            // Simpan data pengguna di sesi
            Auth::login($user);

            // Simpan nama pengguna di sesi untuk digunakan di halaman lain
            session(['user_name' => $user->user_nama]);

            // Jika 'remember me' dicentang
            $remember = $request->has('remember');

            // Redirect ke halaman home setelah login
            return redirect()->intended('/');
        } else {
            // Jika login gagal, kembali dengan pesan error
            return back()->withErrors(['nama' => 'Nama atau password salah.']);
        }
    }
}
