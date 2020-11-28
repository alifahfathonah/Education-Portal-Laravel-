<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PhotoGalleryYear extends Model
{
    //
    public function photoGallery()
    {
        return $this->hasMany(PhotoGallery::class,'year','id');
    }
}
