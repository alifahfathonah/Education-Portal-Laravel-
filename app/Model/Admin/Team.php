<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    //
    use SoftDeletes;

    public function teamPanelNames()
    {
        return $this->hasOne(TeamPanelName::class,'id','panel_name_id');
    }
}
