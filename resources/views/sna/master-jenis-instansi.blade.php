@extends('layouts.master')

@section('title', 'Jenis Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Data Instansi'])

<div class="row">
    <div class="col-xs-12 py-5" style="padding: 15px;">
        <!-- Tombol Tambah Jenis Instansi -->
        <button class="btn btn-white btn-info btn-bold m-10" data-toggle="modal" data-target="#addJenisInstansiModal">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Tambah Jenis Instansi
        </button>

        <!-- Modal Tambah Jenis Instansi -->
        <div id="addJenisInstansiModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jenis Instansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jenis_instansi.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis_instansi_nama">Nama Jenis Instansi</label>
                                <input type="text" class="form-control" id="jenis_instansi_nama"
                                    name="jenis_instansi_nama" required>
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
            Data Jenis Instansi
        </div>
        <!-- Tabel Data Jenis Instansi -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Jenis Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($jenisInstansi as $item)
                        <tr>
                            <td>{{ $item->jenis_instansi_nama }}</td>
                            <td>
                                <a href="{{ route('jenis_instansi.show', $item->jenis_instansi_id) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('jenis_instansi.edit', $item->jenis_instansi_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jenis_instansi.destroy', $item->jenis_instansi_id) }}" method="POST"
                                    style="display:inline;">
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