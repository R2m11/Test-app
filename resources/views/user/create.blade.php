@extends('layouts.master')

@section('content')
<h1 class="text-primary m-4">Form Tambah User Untuk tiap bagian</h1>
<form action="/user" method="post">
    @csrf
    <div class="card pb-5 mx-3">
        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        </div>

        @error('name')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror


        <div class="form-group mx-4">
            <label for="email" class="text-md text-primary font-weight-bold">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        </div>

        @error('email')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="password" class="text-md text-primary font-weight-bold">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        </div>

        @error('password')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror


        <div class="button-save d-flex justify-content-end">
            <a href="/user" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
        </form>
        </div>
    </div>
@endsection
