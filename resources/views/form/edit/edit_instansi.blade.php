@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Tambah Data Instansi'])

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `
                                                                                                    <ul style="text-align: left;">
                                                                                                        @foreach ($errors->all() as $error)
                                                                                                            <li>{{ $error }}</li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                `,
                confirmButtonText: 'Tutup'
            });
        });
    </script>
@endif


<div class=" card" style="padding:12px">
    <a href="{{ route('instansi.index') }}" class="btn btn-primary mb-4">
        <i class="ace-icon fa fa-arrow-left bigger-120"></i> Kembali
    </a>
    <div
        style="padding: 24px; border:solid 1px darkgray; box-shadow: black 12px ; border-radius:14px; background-color:rgb(247, 246, 246); margin-top: 20px; ">

        <form action="{{ route('instansi.update', $instansi->instansi_id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="instansi_nama" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="instansi_nama" name="instansi_nama"
                    value="{{$instansi->instansi_nama}}" placeholder="Masukkan Nama Instansi">
            </div>

            <div class="form-group mb-3">
                <label for="instansi_alamat" class="form-label">Alamat Instansi</label>
                <input type="text" class="form-control" id="instansi_alamat" name="instansi_alamat"
                    placeholder="Masukkan Nama Alamat Instansi">
            </div>

            <!-- Tipe User -->
            <div class="form-group mb-4">
                <label for="instansi_jenis" class="form-label">Pilih Tipe instansi</label>
                <select class="form-control" id="instansi_jenis" name="instansi_jenis" required>
                    <option value="" disabled selected>-- Instansi --</option>
                    @foreach($instansiType as $id => $nama)
                        <option value="{{ $id }}" {{ $instansi->instansi_jenis == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block shadow">Simpan</button>
        </form>
    </div>
</div>


@endsection