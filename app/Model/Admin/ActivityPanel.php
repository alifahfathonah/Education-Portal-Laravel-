<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ActivityPanel extends Model
{
    public function activities()
    {
        return $this->belongsToMany(Activity::class,'activity_panel_activity');
    }
}
