<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //顧客IDが自動増分されないように
    public $incrementing = false;

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function visit_histories()
    {
        return $this->hasMany('App\Models\VisitHistory');
    }
}
