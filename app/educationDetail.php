<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educationDetail extends Model
{
    protected $fillable = ['user_id','inst_name','inst_address','degree','faculty','board','passed_year','division'];
}
