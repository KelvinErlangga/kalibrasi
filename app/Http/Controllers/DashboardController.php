<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil nama pengguna dari sesi
        $userName = Session::get('user_name');

        // Pastikan sesi valid
        if (!$userName) {
            // Redirect ke halaman login jika sesi tidak valid
            return redirect('/login')->withErrors(['message' => 'Anda harus login terlebih dahulu.']);
        }

        // Kirim data ke view
        return view('sna.dashboard', ['userName' => $userName]);
    }
}
