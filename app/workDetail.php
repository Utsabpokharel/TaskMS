<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workDetail extends Model
{
    protected $fillable = ['user_id', 'experience', 'skills', 'projects'];
    public function user()
    {
        return $this->belongsTo('App\allUser', 'user_id');
    }
}
