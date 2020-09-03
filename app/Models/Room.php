<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'local_id'];
    
    public function local(){
        return $this->belongsTo('App\Models\Local');
    }
}
