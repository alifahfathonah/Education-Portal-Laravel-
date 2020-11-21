<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    //
    public function blogcategories()
    {
        return $this->hasOne(BlogCategory::class,'id','category');
    }
}
