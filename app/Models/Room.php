<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    use HasFactory;
    protected $table = 'room';
    protected $fillable = [
        "roomname",
        "roomdesc",
        "image",
        "status"
    ];

    public function bookingroom()
    {
        return $this->hasMany(BookingRoom::class,'room_id');
    }
}
