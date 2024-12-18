@extends('layouts.master')
@include('layouts.htmlheader')

@section('title', 'Jenis Instansi | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Jenis Instansi'])

<div class="row">
    <div class="col-xs-12 py-5" style="padding: 15px;">
        <!-- Tombol Tambah Jenis Instansi -->
        <a href="{{ route('jenis_instansi.create') }}" class="btn btn-primary btn-bold m-10">
            <i class="fa fa-plus bigger-110 white"></i>
            Tambah Jenis Instansi
        </a>
        <div class="table-header" style="padding:10px; display:flex; margin-top: 10px; justify-content: space-between;">
            Data Jenis Instansi
        </div>
        <table style="margin-top:15px;" id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis Instansi</th>
                    <th style="text-align: center;">Edit</th>
                    <th style="text-align: center;">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jenisinstansi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jenis_instansi_nama }}</td>
                        <td style="text-align: center;">
                            <!-- Contoh tombol aksi -->
                            <a href="{{ route('jenis_instansi.edit', $item->jenis_instansi_id) }}"
                                class="fa fa-pencil-square-o bigger-110 blue"></a>
                        </td>
                        <td style="text-align: center;">
                            <button type="button" class="fa fa-trash bigger-110 red bg-none" data-toggle="modal"
                                data-target="#exampleModal" data-id="{{ $item->jenis_instansi_id }}"
                                data-nama="{{ $item->jenis_instansi_nama }}" style="border: none; background: none;">
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <form action="{{ route('jenis_instansi.destroy', $item->jenis_instansi_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="width: 50%; margin: 0 auto;">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel"><b>Hapus Data Pengguna</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Content goes here, e.g., showing user name for deletion -->
                                        <div style="text-align: center;">
                                            <h5>Apakah Anda yakin ingin menghapus data pengguna ini?</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .modal-dialog {
                                max-width: 100%;
                                /* Or any custom value */
                                margin: 30vh auto;
                                /* Centers the modal vertically */
                            }

                            .modal-content {
                                border-radius: 10px;
                                /* Optional: Rounded corners for the modal */
                            }

                            .modal-header {
                                background-color: #f8f9fa;
                                /* Light background color for the header */
                            }

                            .modal-footer {
                                text-align: center;
                                /* Optional: Center the buttons in the footer */
                            }
                        </style>
                    </form><!-- Modal -->
                    <form action="{{ route('jenis_instansi.destroy', $item->jenis_instansi_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="width: 50%; margin: 0 auto;">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel"><b>Hapus Data Pengguna</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Content goes here, e.g., showing user name for deletion -->
                                        <div style="text-align: center;">
                                            <h5>Apakah Anda yakin ingin menghapus data pengguna ini?</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .modal-dialog {
                                max-width: 100%;
                                /* Or any custom value */
                                margin: 30vh auto;
                                /* Centers the modal vertically */
                            }

                            .modal-content {
                                border-radius: 10px;
                                /* Optional: Rounded corners for the modal */
                            }

                            .modal-header {
                                background-color: #f8f9fa;
                                /* Light background color for the header */
                            }

                            .modal-footer {
                                text-align: center;
                                /* Optional: Center the buttons in the footer */
                            }
                        </style>
                    </form>e
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center;">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>



        <nav aria-label="...">
            <ul class="pagination">
                <!-- Tombol Previous -->
                <li class="page-item {{ $jenisinstansi->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $jenisinstansi->previousPageUrl() }}">Previous</a>
                </li>

                <!-- Tombol Halaman -->
                @foreach ($jenisinstansi->getUrlRange(1, $jenisinstansi->lastPage()) as $page => $url)
                    <li class="page-item {{ $jenisinstansi->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Tombol Next -->
                <li class="page-item {{ $jenisinstansi->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $jenisinstansi->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection