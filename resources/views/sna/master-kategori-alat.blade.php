@extends('layouts.master')

@section('title', 'Kategori Alat | SNA MEDIKA')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <!-- Tombol Tambah Kategori Alat -->
        <button class="btn btn-white btn-info btn-bold m-10" data-toggle="modal" data-target="#addKategoriAlatModal">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Tambah Kategori Alat
        </button>

        <!-- Modal Tambah Kategori Alat -->
        <div id="addKategoriAlatModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori Alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kategori_alat.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_alat_nama">Nama Kategori Alat</label>
                                <input type="text" class="form-control" id="kategori_alat_nama" name="kategori_alat_nama" required>
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
            Data Kategori Alat
        </div>

        <!-- Tabel Data Kategori Alat -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Kategori Alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($kategoriAlats as $item)
                    <tr>
                        <td>{{ $item->kategori_alat_nama }}</td>
                        <td>
                            <a href="{{ route('kategori_alat.show', $item->kategori_alat_id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('kategori_alat.edit', $item->kategori_alat_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kategori_alat.destroy', $item->kategori_alat_id) }}" method="POST" style="display:inline;">
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
