<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalDetail extends Model
{
    protected $fillable = [
        'user_id','address1', 'address2','phone1', 'phone2','dob','about','citzn_f','citzn_b'
    ];
}
