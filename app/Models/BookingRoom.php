<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    use HasFactory;
    protected $table = 'bookingroom';
    protected $fillable = [
        "user_id",
        "room_id",
        "date_start",
        "date_end"
    ];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
