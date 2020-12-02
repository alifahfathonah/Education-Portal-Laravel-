<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function activityPanels()
    {
        return $this->belongsToMany(ActivityPanel::class,'activity_panel_activity');
    }
}
