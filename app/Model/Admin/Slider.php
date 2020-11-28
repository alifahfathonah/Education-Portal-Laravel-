<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    public function sliderPriorities()
    {
        return $this->hasOne(SliderPriority::class,'id','priority');
    }

}
