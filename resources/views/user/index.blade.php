@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush

@push('scripts')
    <script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush

@section('content')
<div class="card mx-4 my-4">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-header-left">Data User</h4>
        <button type="button" class="btn btn-primary">
            <a href="/user/create" style="color: white">Tambah Data User</a>
            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
        </button>
    </div>
    <div class="table-responsive p-3">
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->role->role }}</td>
                    <td>
                        <form action="/user/{{ $p->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex">
                                    <a href="/user/{{ $p->id }}/edit" class="btn btn-sm btn-info mx-2 text-white">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
