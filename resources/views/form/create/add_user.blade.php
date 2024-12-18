@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Data User'])

<!-- Alert Section -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class=" card" style="padding:12px">
    <a href="{{ route('tambah_user.index') }}" class="btn btn-primary mb-4">
        <i class="ace-icon fa fa-arrow-left bigger-120"></i> Kembali
    </a>
    <div
        style="padding: 24px; border:solid 1px darkgray; box-shadow: black 12px ; border-radius:14px; background-color:rgb(247, 246, 246); margin-top: 20px; ">


        <form action="{{ route('user.store') }}" method="POST" class="card-body">
            @csrf

            <div class="form-group mb-3">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" class="form-control" id="user_username" name="user_username"
                    placeholder="Masukkan username" required pattern="^\S+$"
                    title="Username tidak boleh mengandung spasi.">
                <small id="usernameError" class="text-danger"
                    style="display: none; font-size: 12px; font-weight: 500; ">
                    Username tidak boleh mengandung spasi.
                </small>
            </div>

            <script>
                const usernameInput = document.getElementById('user_username');
                const usernameError = document.getElementById('usernameError');

                usernameInput.addEventListener('input', () => {
                    if (/\s/.test(usernameInput.value)) {
                        usernameError.style.display = 'block'; // Tampilkan peringatan
                    } else {
                        usernameError.style.display = 'none'; // Sembunyikan peringatan
                    }
                });
            </script>

            <div class="form-group mb-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password"
                    placeholder="Masukkan password" required minlength="6">
                <small id="passwordError" class="text-danger" style="display: none;">
                    Password harus terdiri dari minimal 6 karakter.
                </small>
            </div>

            <script>
                const passwordInput = document.getElementById('user_password');
                const passwordError = document.getElementById('passwordError');

                passwordInput.addEventListener('input', () => {
                    if (passwordInput.value.length > 0 && passwordInput.value.length < 6) {
                        passwordError.style.display = 'block'; // Tampilkan peringatan
                    } else {
                        passwordError.style.display = 'none'; // Sembunyikan peringatan
                    }
                });
            </script>


            <!-- Nama Pengguna -->
            <div class="form-group mb-3">
                <label for="user_nama" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="user_nama" name="user_nama"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <!-- Tipe User -->
            <div class="form-group mb-4">
                <label for="user_akses" class="form-label">Tipe User</label>
                <select class="form-control" id="user_akses" name="user_akses" required>
                    <option value="" disabled selected>Pilih tipe user</option>
                    @foreach ($userTypes as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block shadow">Simpan</button>
        </form>
    </div>
</div>


@endsection