<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //ユーザー入力値nameとsector_idはホワイトリスト
    protected $fillable = ['name', 'sector_id'];

    //リレーション設定
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function visit_histories()
    {
        return $this->hasMany('App\Models\VisitHistory');
    }
}
