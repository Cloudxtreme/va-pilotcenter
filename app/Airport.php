<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function runways()
    {
        return $this->hasMany('App\Runway');
    }
}
