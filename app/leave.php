<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    protected $guarded = [];

    public function applied()
    {
        return $this->belongsTo('App\allUser', 'applied_by');
    }
    public function checked()
    {
        return $this->belongsTo('App\allUser', 'checked_by');
    }
    public function leavetype()
    {
        return $this->belongsTo('App\leaveType', 'leave_type');
    }
}
