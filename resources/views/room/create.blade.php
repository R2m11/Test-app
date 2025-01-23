@extends('layouts.master')

@section('content')

<div class="card mx-5 my-4">
    <div class="card-header py-3">
        <h1>Tambah Ruangan</h1>
        <form action="/room" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="roomname">Masukan Nama Ruangan :</label>
                <input type="text" id="roomname" class="form-control" name="roomname">
            </div>
            <div class="form-group">
                <label for="roomdesc">Masukan Deskripsi Ruangan :</label>
                <input type="text" id="roomdesc" class="form-control" name="roomdesc">
            </div>
            <div class="form-group">
                <label for="image">Masukan Gambar Ruangan</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="button-save d-flex justify-content-end">
                <a href="/room" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
