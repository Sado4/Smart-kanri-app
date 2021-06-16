<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //顧客IDが自動増分されないように
    public $incrementing = false;

    public function profile()
    {
        // Profileモデルのデータを引っ張ってくる
        return $this->hasOne('App\profile');
    }
}
