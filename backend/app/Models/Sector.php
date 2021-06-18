<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function shops()
    {
        return $this->hasMany('App\Models\shop');
    }
}
