<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function visit_histories()
    {
        return $this->hasMany('App\Models\VisitHistory');
    }

    // 画像のURLのアクセサを定義
    public function getFullImageUrlAttribute()
    {
        // 画像のフルパスを返す
        return  config('filesystems.disks.s3.disp_url') . '/' . config('filesystems.disks.s3.bucket') . '/' . $this->image;
    }
}