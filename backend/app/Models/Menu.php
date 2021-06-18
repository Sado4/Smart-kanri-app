<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function visit_history()
    {
        return $this->belongsTo('App\Models\VisitHistory');
    }
}
