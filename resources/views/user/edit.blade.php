@extends('layouts.master')

@section('content')
<h1 class="text-primary mx-3 my-3">Form Edit User</h1>
<div class="card pb-5 mx-3">
        <form action="/user/{{ $user->id }}" method="post">
            @csrf
            @method('put')
        <div class="form-group mx-4">
            <label for="name" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  old('name', $user->name)  }}">
        </div>

        @error('name')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="email" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  old('email', $user->email)  }}">
        </div>

        @error('email')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="role_id" class="text-md text-primary font-weight-bold">Posisi atau Jabatan</label>
            <select name="role_id" id="role_id" class="form-control">
            <option value="{{ $user->role_id }}" selected>{{ $user->role->role }}</option>
            @foreach ($role as $item )
            <option value="{{ $item->id }}">{{ $item->role }}</option>
            @endforeach

            </select>
        </div>

        @error('role_id')
        <div class="alert-danger mx-4 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="password" class="text-md text-primary font-weight-bold">Password :</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password',$user->password)}}">
        </div>

        @error('password')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <a href="/user" class="btn btn-danger mt-4  px-4 py-1">Batal</a>
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
        </div>
    </form>
    </div>
@endsection
