@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Data User'])

<div class=" card" style="padding:12px">
    <a href="{{ route('tambah_user.index') }}" class="btn btn-primary mb-4">
        <i class="ace-icon fa fa-arrow-left bigger-120"></i> Kembali
    </a>
    <div
        style="padding: 24px; border:solid 1px darkgray; box-shadow: black 12px ; border-radius:14px; background-color:rgb(247, 246, 246); margin-top: 20px; ">

        <form action="{{ route('user.update', $user->user_id) }}" method="POST" class="card-body">
            @csrf
            @method('PUT')
            <!-- Username -->
            <div class="form-group mb-3">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" class="form-control" id="user_username" name="user_username"
                    placeholder="Masukkan username" value="{{$user->user_username}}" required>
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password"
                    placeholder="Masukkan password" required minlength="8" value="{{$user->user_password}}">
                <label style="font-size: 12px; font-weight:700 color: red; margin-top:8px;">Password</label>
            </div>

            <!-- Nama Pengguna -->
            <div class="form-group mb-3">
                <label for="user_nama" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="user_nama" name="user_nama"
                    placeholder="Masukkan nama lengkap" required value="{{$user->user_nama}}">
            </div>

            <!-- Tipe User -->
            <div class="form-group mb-4">
                <label for="user_akses" class="form-label">Tipe User</label>
                <select class="form-control" id="user_akses" name="user_akses" required>
                    <!-- Menampilkan pilihan default yang tidak dapat dipilih -->
                    <option value="" disabled selected>Pilih tipe user</option>

                    <!-- Iterasi melalui tipe user yang ada di $userTypes -->
                    @foreach ($userTypes as $type)
                        <option value="{{ $type }}" {{ $user->user_akses == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block shadow">Simpan</button>
        </form>
    </div>
</div>


@endsection