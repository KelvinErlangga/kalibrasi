@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <!-- Tombol Tambah Instansi -->
        <button class="btn btn-white btn-info btn-bold m-10" data-toggle="modal" data-target="#addInstansiModal">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Tambah Instansi
        </button>

        <!-- Modal Tambah Instansi -->
        <div id="addInstansiModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Instansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jenis_instansi.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis">Jenis Instansi</label>
                                <input type="text" class="form-control" id="jenis" name="instansi_jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Instansi</label>
                                <input type="text" class="form-control" id="nama" name="instansi_nama" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Instansi</label>
                                <textarea class="form-control" id="alamat" name="instansi_alamat" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-header">
            Data Instansi
        </div>
        <!-- Tabel Data Instansi -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Jenis Instansi</th>
                        <th>Nama Instansi</th>
                        <th class="hidden-480">Alamat Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($instansi as $item)
                    <tr>
                        <td>{{ $item->instansi_jenis }}</td>
                        <td>{{ $item->instansi_nama }}</td>
                        <td>{{ $item->instansi_alamat }}</td>
                        <td>
                            <a href="{{ route('instansi.show', $item->instansi_id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('instansi.edit', $item->instansi_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('instansi.destroy', $item->instansi_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
