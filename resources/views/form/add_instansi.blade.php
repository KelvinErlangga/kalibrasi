@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Data Instansi'])

<div class="container">


    <form action="{{ route('jenis_instansi.store') }}" method="POST">
        @csrf
        <div style="padding-block: 20px; ">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Jenis Instansi
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Nama Instansi</label>
            <input type="text" class="form-control" id="nama" name="instansi_nama" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Instansi</label>
            <textarea class="form-control" id="alamat" name="instansi_alamat" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection