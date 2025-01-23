@extends('layouts.master')

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('../assets/plugins/plugin.css') }}">
@endpush

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
<div class="card-body text-center">
    <div class="row justify-content-center">
        <div class="col-sm-1 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">User yang terdaftar</p>
                                <h4 class="card-title">{{ $user->where('role_id', 2)->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Ruangan Yang terdaftar</p>
                                <h4 class="card-title"><a href="/room">{{ count($room) }}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-calendar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Ruangan yang diguanakan hari ini</p>
                                <h6 class="card-title">{{ count($bookingroom) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->role_id == '2')
<div class="card mx-4 my-4">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-header-left">Data Ruangan Yang Available</h4>
        <button type="button" class="btn btn-primary">
            <a href="/bookingroom/create" style="color: white">Buat Peminjaman Ruangan</a>
            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
        </button>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-flush table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Selesai Pinjam</th>
                    <th>User Peminjam</th>
                    <th>Nama Ruangan</th>
                    <th>Deskripsi Ruangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @php
                $index = 1;
            @endphp
            @foreach ($bookingroom as $b)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $b->date_start }}</td>
                    <td>{{ $b->date_end }}</td>
                    <td>{{ $b->user->name }}</td>
                    <td>{{ $b->room->roomname }}</td>
                    <td>{{ $b->room->roomdesc }}</td>
                    <td>
                        @if ($b->room->status == 0)
                            <span class="badge text-bg-success">Available</span>
                        @else
                            <span class="badge text-bg-danger">Not Available</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<div class="d-flex flex-wrap mx-4 my-4">
    @foreach ($room0 as $b)
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $b->roomname }}</h5>
            <img src="{{ Asset('/storage/image/'.$b->image)}}" class="card-img-top" alt="...">
            <p class="card-text">{{ $b->roomdesc }}</p>
            @if ($b->status == 0)
                <span class="badge text-bg-success">Available</span>
            @else
                <span class="badge text-bg-danger">Not Available</span>
            @endif
        </div>
    </div>
    @endforeach
</div>


@endif


@if (Auth::user()->role_id == '1')
<div class="card mx-4 my-4">
    <div class="card-header">Data Ruangan yang sudah diBooking</div>
    <div class="table-responsive p-3">
        <table id="dataTable" class="table table-flush table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Selesai Pinjam</th>
                        <th>Nama Ruangan</th>
                        <th>Deskripsi Ruangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($bookingroom as $b)
                    <tr>
                        <td>{{ $b->date_start }}</td>
                        <td>{{ $b->date_end }}</td>
                        <td>{{ $b->room->roomname }}</td>
                        <td>{{ $b->room->roomdesc }}</td>
                        <td>
                            @if ($b->room->status == 0)
                                <span class="badge text-bg-success">Available</span>
                            @else
                                <span class="badge text-bg-danger">Not Available</span>
                            @endif
                        </td>
                        <td>
                            <form action="/bookingroom/{{ $b->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex">
                                        <a href="/bookingroom/{{ $b->id }}/edit" class="btn btn-sm btn-info mx-2 text-white">Edit</a>
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

<div class="d-flex flex-wrap mx-4 my-4">
    @foreach ($room0 as $b)
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $b->roomname }}</h5>
            <img src="{{ Asset('/storage/image/'.$b->image)}}" class="card-img-top" alt="...">
            <p class="card-text">{{ $b->roomdesc }}</p>
            @if ($b->status == 0)
                <span class="badge text-bg-success">Available</span>
            @else
                <span class="badge text-bg-danger">Not Available</span>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
