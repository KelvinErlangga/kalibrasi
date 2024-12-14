@extends('layouts.master')


@section('content')
<div class="row ">
   @include('layouts.breadcrumbs',['title' =>'Data Instansi'])


    <div class="col-xs-12 py-5" style="padding: 15px;">
        <!-- Tombol Tambah Instansi -->
        <a href="{{ route('add_instansi') }}" class="btn btn-white btn-info btn-bold m-10">
            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
            Tambah Instansi
        </a>



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
                                <a href="{{ route('instansi.show', $item->instansi_id) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('instansi.edit', $item->instansi_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('instansi.destroy', $item->instansi_id) }}" method="POST"
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