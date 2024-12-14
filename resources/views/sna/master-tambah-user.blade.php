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
            <div class="bg-primary" style="margin-left: 15px; width: 25%;">
                <b><select id="pilDivisi" class="form-control pilih-divisi bg-success"
                        data-placeholder="Pilih Divisi...">
                        <option value="https://demo.progsby.co.id/sna/master-user/pilih/0" selected="selected" disabled>
                            --
                            Pilih Divisi
                        </option>
                        <option value=""><b>PENGGUNA</b></option>
                        <option value=""><b>ADMIN</b></option>
                        <option value=""><b>SUPERADMIN</b></option>
                    </select>
                </b>
            </div>
        </div>
        <!-- Tabel Data Jenis Alat -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
                    @foreach($user as $item)
                        <tr>
                            <td>{{ $item->user_username }}</td>
                            <td>{{ $item->user_nama }}</td>
                            <td>{{ $item->user_password }}</td>
                            <td>{{ $item->user_akses}}</td>

                            <td style="text-align: center;">
                                <a href="{{ route('user.edit', $item->user_id) }}" class="fa fa-pencil-square-o bigger-110 blue"></a>
                            </td>
                            <td style="text-align: center;">
                                <form action="{{ route('user.hapus', $item->user_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fa fa-trash bigger-110 red bg-none"
                                        style="border: none; background: none;"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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