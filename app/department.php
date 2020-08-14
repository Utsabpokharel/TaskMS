<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = ['main_dept','sub_dept','description'];
}
