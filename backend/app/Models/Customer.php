<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        if (config('app.debug')) {
            // 画像のフルパスを返す
            return  config('filesystems.disks.s3.disp_url') . '/' . config('filesystems.disks.s3.bucket') . '/' . $this->image;
        } else {
            return Storage::disk('s3')->url($this->image);
        }
    }
}