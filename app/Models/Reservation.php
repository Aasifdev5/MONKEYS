<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['room_id', 'user_id', 'date', 'full_name','email','phone','check_in_time', 'check_out_time', 'guests','proof_path', 'status', 'payment_status'];

    public function room()
    {
        return $this->belongsTo(Property::class, 'room_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
