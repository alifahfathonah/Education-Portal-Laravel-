<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ActivityPanel extends Model
{
    public function activities()
    {
        return $this->belongsToMany(Activity::class,'activity_panel_activity');
    }

    public function activityPosts()
    {
        return $this->belongsToMany(ActivityPost::class,'activity_post_activity_panel')->withTimestamps();
    }
}
