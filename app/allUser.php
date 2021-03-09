<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class allUser extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'image', 'emp_id', 'gender', 'position', 'joined_date', 'role_id', 'department_id', 'sub_department', 'status'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsTo('App\role', 'role_id');
    }

    public function department()
    {
        return $this->belongsTo('App\department', 'department_id');
    }

    public function task()
    {
        return $this->hasMany('App\toDo');
    }
    public function leaves()
    {
        return $this->hasMany('App\leave');
    }
    public function personal()
    {
        return $this->hasOne('App\personalDetail');
    }
    public function work()
    {
        return $this->hasOne('App\workDetail');
    }
}
