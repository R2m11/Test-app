@extends('layouts.master')

@section('content')
<div class="card mx-5 my-4">
    <div class="card-header py-3">
        <h1>Mengubah Data Ruangan</h1>
        <form action="/room/{{$room->id}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="roomname">Nama Ruangan:</label>
                <input type="text" id="roomname" class="form-control" name="roomname" value="{{old('roomname',$room->roomname)}}" required>
            </div>
            <div class="form-group">
                <label for="roomdesc">Nama Gedung:</label>
                <input type="text" id="roomdesc" class="form-control" name="roomdesc" value="{{old('roomdesc',$room->roomdesc)}}" required>
            </div>

            <div class="button-save d-flex justify-content-end">
                <a href="/room" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
