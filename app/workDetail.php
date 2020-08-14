<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workDetail extends Model
{
    protected $fillable = ['user_id','experience','skills','projects'];
}
