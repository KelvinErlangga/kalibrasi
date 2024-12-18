@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Jenis Instansi'])

<div class="card" style="padding:12px">
    <a href="{{ route('jenis_alat.index') }}" class="btn btn-primary mb-4">
        <i class="ace-icon fa fa-arrow-left bigger-120"></i> Kembali
    </a>
    <div
        style="padding: 24px; border:solid 1px darkgray; box-shadow: black 12px; border-radius:14px; background-color:rgb(247, 246, 246); margin-top: 20px;">
        <form action="{{ route('jenis_alat.store') }}" method="POST" class="card-body">
            @csrf
            <div class="form-group mb-3">
                <label for="jenis_alat_nama" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="jenis_alat_nama" name="jenis_alat_nama"
                    placeholder="Masukkan Nama Instansi" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block shadow">Simpan</button>
        </form>
    </div>
</div>
@endsection