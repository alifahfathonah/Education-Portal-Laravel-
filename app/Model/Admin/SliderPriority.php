<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SliderPriority extends Model
{
    //
    public function sliders()
    {
        return $this->hasMany(Slider::class,'id','priority');
    }
}
