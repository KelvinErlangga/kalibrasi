@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Data User'])

<div
    style="border-radius:15px; padding: 20px; background-color:rgb(238, 237, 237);  margin-top: 20px; border: solid 1px rgb(173, 173, 173);">
    <h1 style="margin-bottom: 20px;">Tambah Data User</h1>

    <form action="{{ route('user.store') }}" method="POST" class="card-body">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_username">Username</label>
                    <input type="text" class="form-control" id="user_username" name="user_username" required>
                </div>

                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" id="user_password" name="user_password" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_nama">Nama Pengguna</label>
                    <input type="text" class="form-control" id="user_nama" name="user_nama" required>
                </div>

                <div class="form-group">
                    <label for="user_type">Tipe User</label>
                    <select class="form-control" name="user_type" required>
                        @foreach ($userTypes as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>




        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection