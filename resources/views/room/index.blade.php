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

    <div class="card mx-2 my-4">
        <div class="card-header d-flex justify-content-between">
            <h1 class="card-header-left">Data Ruangan</h1>
            @if(Auth::user()->role_id == '1')
            <button type="button" class="btn btn-primary">
                <a href="/room/create" style="color: white">Tambah Data</a>
                <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
            </button>
            @endif
        </div>
        <div class="table-responsive p-3">
            <table  id="dataTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Gambar</th>
                        <th scope="col" style="text-align: center">Nama Ruangan</th>
                        <th scope="col" style="text-align: center">Descripsi Ruangan</th>
                        <th scope="col" style="text-align: center">Status</th>
                        @if(Auth::user()->role_id == '1')
                        <th scope="col" style="text-align: center">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                     @foreach ( $room as $g )
                    <tr>
                        <td>
                            <img src="{{ asset('/storage/image/'. $g->image) }}" alt="{{ $g->roomname }}" style="width: 100px; height: auto; max-height: 100px; object-fit: cover;">
                        </td>
                        <td style="text-align: center">{{ $g->roomname }}</td>
                        <td style="text-align: center">{{$g->roomdesc}}</td>
                        <td style="text-align: center">
                            @if ($g->status == 0)
                                <span class="badge text-bg-success">Available</span>
                            @else
                                <span class="badge text-bg-danger">Not Available</span>
                            @endif
                        </td>
                        @if(Auth::user()->role_id == '1')
                        <td>
                            <form action="/room/{{ $g->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex">
                                        <a href="/room/{{ $g->id }}/edit" class="btn btn-sm btn-info mx-2 text-white">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </div>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
