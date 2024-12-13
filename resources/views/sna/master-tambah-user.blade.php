@extends('layouts.master')

@section('title', 'Jenis Alat | SNA MEDIKA')

@section('content')
<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Dashboard</li>
    </ul>

    <div class="nav-search" id="nav-search">
        <i class="ace-icon fa fa-user user-icon mr-5"></i>
        <b class="pl-2">{{session('user_name')}}</b>
    </div><!-- /.nav-search -->

</div>

<div class="row" style="padding: 10;">
    <div class="col-xs-12">
        <!-- Tombol Tambah Jenis Alat -->
        <button class="btn btn-white btn-info btn-bold m-10" data-toggle="modal" data-target="#addJenisAlatModal">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Tambah Jenis Alat
        </button>

        <!-- Modal Tambah Jenis Alat -->
        <div id="addJenisAlatModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jenis Alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jenis_alat.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis">Jenis Alat</label>
                                <input type="text" class="form-control" id="jenis" name="jenis_alat_nama" required>
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
            Data Jenis Alat
        </div>
        <!-- Tabel Data Jenis Alat -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Jenis Alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($jenisAlat as $item)
                        <tr>
                            <td>{{ $item->jenis_alat_nama }}</td>
                            <td>
                                <a href="{{ route('jenis_alat.show', $item->jenis_alat_id) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('jenis_alat.edit', $item->jenis_alat_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jenis_alat.destroy', $item->jenis_alat_id) }}" method="POST"
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