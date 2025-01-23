<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $room = Room::all();
        $search = $request->input('search');
        $searchResults = collect();
        return view('room.index', compact('room','search','searchResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = Room::all();
        return view('room.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "roomname" => "required",
            "roomdesc"=> "required",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $imagename = time(). ' . ' .$request->image->extension();
        $request->image->storeAs('image', $imagename,'public');

        Room::create([
            'roomname' => $request->roomname,
            'roomdesc' => $request->roomdesc,
            'image' => $imagename
        ]);

        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('/room');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $request->validate([
            "roomname" => "required",
            "roomdesc"=> "required",
            "image"=> "required"
        ]);

        if($request->hasFile('image')){
            if($room->image) {
                Storage::delete('public/image/'.$room->image);
            }
            $imagename = time().'.'.$request->image->extension();
            $request->image->storeAs('image', $imagename,'public');
            $room->image = $imagename;
        }

        $room->roomname = $request->roomname;
        $room->roomdesc = $request->roomdesc;
        $room->save();

        Alert::success("Berhasil",'Berhasil mengubah data');
        return redirect('/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect('/room');
    }
}
