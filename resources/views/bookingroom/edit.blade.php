@extends('layouts.master')

@section('content')
<div class="card mx-5 my-4">
    <div class="card-header py-3">
        <h1>Mengubah Data Ruangan</h1>
        <form action="/bookingroom/{{$booking->id}}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="user_id">Pilih User:</label>
                <select id="user_id" class="form-control" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="room_id">Pilih Ruangan:</label>
                <select id="room_id" class="form-control" name="room_id" required>
                    <option value="" disabled>Pilih Ruangan</option>
                    @foreach ($room as $room)
                        <option value="{{ $room->id }}" {{ $room->id == $booking->room_id ? 'selected' : '' }}>{{ $room->roomname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_start">Tanggal Mulai:</label>
                <input type="date" id="date_start" class="form-control" name="date_start" value="{{old('date_start',$booking->date_start)}}" required>
            </div>

            <div class="form-group">
                <label for="date_end">Tanggal Selesai:</label>
                <input type="date" id="date_end" class="form-control" name="date_end" value="{{old('date_end',$booking->date_end)}}" required>
            </div>

            <div class="button-save d-flex justify-content-end">
                <a href="/home" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

