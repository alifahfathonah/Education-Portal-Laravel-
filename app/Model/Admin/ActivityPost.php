<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ActivityPost extends Model
{
    public function activityPanels()
    {
        return $this->belongsToMany(ActivityPanel::class,'activity_post_activity_panel')->withTimestamps();
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class,'activity_post_activity');
    }
}
