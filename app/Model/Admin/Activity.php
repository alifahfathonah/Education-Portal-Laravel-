<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function activityPanels()
    {
        return $this->belongsToMany(ActivityPanel::class,'activity_panel_activity');
    }

    public function activityPosts()
    {
        return $this->belongsToMany(ActivityPost::class,'activity_post_activity')->withTimestamps();
    }
}
