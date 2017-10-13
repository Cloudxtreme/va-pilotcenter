<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function departureAirport()
    {
        return $this->belongsTo('App\Airport');
    }

    public function arrivalAirport()
    {
        return $this->belongsTo('App\Airport');
    }
}
