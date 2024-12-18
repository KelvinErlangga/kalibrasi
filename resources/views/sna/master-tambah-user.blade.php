@extends('layouts.master')
@include('layouts.htmlheader')

@section('title', 'Jenis Alat | SNA MEDIKA')

@section('content')
@include('layouts.breadcrumbs', ['title' => 'Data user'])

<div class="row">
    <div class="col-xs-12 py-5" style="padding: 15px;">
        <!-- Tombol Tambah Jenis Alat -->
        <a href="{{ route('user.create') }}" class="btn btn-primary  btn-bold m-10 ">
            <i class="fa fa-plus bigger-110 white"></i>
            Tambah Pengguna
        </a>

        <div class="table-header" style="padding:10px; display:flex; margin-top: 10px; justify-content: space-between;">
            Data User pengguna

        </div>
        <!-- Tabel Data Jenis Alat -->
        <div>
            <table style="margin-top:15px;" id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Akses</th>
                        <th style="text-align: center;">Edit</th>
                        <th style="text-align: center;">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $item)
                        <tr>
                            <td>{{ $item->user_username }}</td>
                            <td>{{ $item->user_nama }}</td>
                            <td>{{ $item->user_password }}</td>
                            <td>{{ $item->user_akses }}</td>

                            <td style="text-align: center;">
                                <a href="{{ route('user.edit', $item->user_id) }}"
                                    class="fa fa-pencil-square-o bigger-110 blue"></a>
                            </td>
                            <td style="text-align: center;">
                                <button type="button" class="fa fa-trash bigger-110 red bg-none" data-toggle="modal"
                                    data-target="#exampleModal" data-id="{{ $item->user_id }}"
                                    data-nama="{{ $item->user_nama }}" style="border: none; background: none;">
                                </button>
                            </td>

                        </tr>
                        <!-- Modal -->
                        <form action="{{ route('user.hapus', $item->user_id) }}" method="POST">
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
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <nav aria-label="...">
                <ul class="pagination">
                    <!-- Tombol Previous -->
                    <li class="page-item {{ $user->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $user->previousPageUrl() }}">Previous</a>
                    </li>

                    <!-- Tombol Halaman -->
                    @foreach ($user->getUrlRange(1, $user->lastPage()) as $page => $url)
                        <li class="page-item {{ $user->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Tombol Next -->
                    <li class="page-item {{ $user->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $user->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection