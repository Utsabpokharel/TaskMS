<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable=['user_id' ,'todo_id','Comment'];

    public function User()
    {
        return $this->belongsTo('App\allUser', 'user_id');
    }
    public function Todo()
    {
        return $this->belongsTo('App\toDo', 'todo_id');
    }
}
