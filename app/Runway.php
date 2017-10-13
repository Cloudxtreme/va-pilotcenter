<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Runway extends Model
{
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
