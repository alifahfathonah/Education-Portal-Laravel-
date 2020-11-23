<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    //
    use SoftDeletes;
    public function blogs()
    {
        return $this->hasMany(Blog::class,'category','id');
    }
}
