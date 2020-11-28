<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    //
    public function photoGalleryYears()
    {
        return $this->hasOne(PhotoGalleryYear::class,'id','year');
    }
}
