@extends('layouts.master')

@section('title', 'Kategori Alat | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Data Kategori Alat'])

<div class="row">
    <div class="col-xs-12 py-5" style="padding: 15px;">

        <a href="{{ route('kategori_alat.create') }}" class="btn btn-primary btn-bold m-10">
            <i class="fa fa-plus bigger-110 white"></i>
            Tambah Kategori Alat
        </a>
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
                                <input type="text" class="form-control" id="kategori_alat_nama"
                                    name="kategori_alat_nama" required>
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
        <div class="table-header" style="padding:10px; display:flex; margin-top: 10px; justify-content: space-between;">
            Data Kategori Alat

        </div>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="margin-top:15px;">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Kategori</th>
                    <th style="text-align: center;">Edit</th>
                    <th style="text-align: center;">Hapus</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kategorialat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kategori_alat_nama }}</td>
                        <td style="text-align: center;">
                            <!-- Contoh tombol aksi -->
                            <a href="{{ route('kategori_alat.edit', $item->kategori_alat_id) }}"
                                class="fa fa-pencil-square-o bigger-110 blue"></a>
                        </td>
                        <td style="text-align: center;">
                            <button type="button" class="fa fa-trash bigger-110 red bg-none" data-toggle="modal"
                                data-target="#exampleModal" data-id="{{ $item->kategori_alat_id }}"
                                data-nama="{{ $item->kategori_alat_nama }}" style="border: none; background: none;">
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <form action="{{ route('kategori_alat.destroy', $item->kategori_alat_id) }}" method="POST">
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
                <li class="page-item {{ $kategorialat->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $kategorialat->previousPageUrl() }}">Previous</a>
                </li>

                <!-- Tombol Halaman -->
                @foreach ($kategorialat->getUrlRange(1, $kategorialat->lastPage()) as $page => $url)
                    <li class="page-item {{ $kategorialat->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Tombol Next -->
                <li class="page-item {{ $kategorialat->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $kategorialat->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection