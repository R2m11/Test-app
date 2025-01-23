<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $user =  User::all();
        $role = Role::all();
        return view('user.index', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $role = Role::all();
        return view('user.create', compact('user', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6', // Pastikan ada validasi panjang minimal password
        ]);

        // Hash password sebelum disimpan
        $request['password'] = bcrypt($request->password);

        User::create($request->all());
        Alert::success('Berhasil','Berhasil Menambahkan User Gendung');
        return redirect('/user');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit($id)
    {
        $user =  User::where('id', $id)->first();
        $role = Role::all();
        return view('user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6', // Validasi panjang password
            'role_id' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Hash password jika ada perubahan
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->save();

        Alert::success('Berhasil', 'Berhasil Mengubah Data User Gendung');
        return redirect('/user');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data User Gendung');
        return redirect('/user');
    }
}
