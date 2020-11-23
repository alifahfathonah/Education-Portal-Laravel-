<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamPanelName extends Model
{
    use SoftDeletes;

    public function teams()
    {
        return $this->hasMany(Team::class,'id');
    }
}
