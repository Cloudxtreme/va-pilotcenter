<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightDatapoint extends Model
{
    public function flight()
    {
        return $this->belongsTo('App\Flight');
    }
}
