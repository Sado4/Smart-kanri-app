<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }
}
