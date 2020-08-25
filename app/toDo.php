<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toDo extends Model
{
    protected $fillable = ['title','description','assignedDate','completedDate','assignedTo','deadline',
    'task_priority','fileUpload','assignedBy','ReAssignedBy','reAssignedTo','reAssignedDate','reDeadline','status','remarks','user_id'];

    public function user_todo(){
        return $this->belongsTo('App\allUser','user_id');
    }
    public function superadmin(){
        return $this->belongsTo('App\allUser','assignedBy');
    }

    public function employee(){
        return $this->belongsTo('App\allUser','assignedTo');

    }
    public function reassignto(){
        return $this->belongsTo('App\allUser','reAssignedTo');
    }
    // public function Todo(){
    //     return $this->hasMany('App\comment');
    // }
}
