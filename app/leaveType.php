<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaveType extends Model
{
    protected $guarded = [];

    public function leaves()
    {
        return $this->hasMany('App\leave');
    }
}
