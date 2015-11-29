<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Climb extends Model
{
    public function users()
    {
        return $this->belongsToMany('\App\User')->withTimestamps();
    }
}
