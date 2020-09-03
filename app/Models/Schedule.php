<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['date', 'starting_time', 'ending_time', 'user_id', 'room_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
