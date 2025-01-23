@extends('layouts.master')

@section('content')
<div class="card mx-5 my-4">
    <div class="card-header py-3">
        <h1>Tambah Booking Ruangan</h1>
        <form action="{{ route('bookingroom.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Pilih User:</label>
                <select id="user_id" class="form-control" name="user_id" required>
                    @if(Auth::user()->role_id == 2)
                    <option value="{{ Auth::id() }}" hidden>{{ Auth::user()->name }}</option>
                    @else
                    @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="room_id">Pilih Ruangan:</label>
                <select id="room_id" class="form-control" name="room_id" required>
                    <option value="" disabled selected>Pilih Ruangan</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->roomname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_start">Tanggal Mulai:</label>
                <input type="date" id="date_start" class="form-control" name="date_start" required>
            </div>

            <div class="form-group">
                <label for="date_end">Tanggal Selesai:</label>
                <input type="date" id="date_end" class="form-control" name="date_end" required>
            </div>

            <div class="button-save d-flex justify-content-end">
                <a href="{{ route('bookingroom.index') }}" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
