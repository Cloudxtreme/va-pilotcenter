<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function user()
    {
        return $this->belongsTo("User");
    }

    public function departureAirport()
    {
        return $this->belongsTo("Airport");
    }

    public function arrivalAirport()
    {
        return $this->belongsTo("Airport");
    }
}
