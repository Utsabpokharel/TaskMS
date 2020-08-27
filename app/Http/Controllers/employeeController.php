<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\toDo;
use App\allUser;

class employeeController extends Controller
{
    
    // protected $toDo = null;
    // protected $All_User = null;
    // // protected $Comment = null;

    // public function __construct(toDo $toDo, allUser $All_User)
    // {
    //     $this->toDo = $toDo;
    //     $this->$All_User = $All_User;
       
    // }

    public function GetList()
    {
        // $user=Auth::user()->id;
        $todo = toDo::where('id','desc')->get();
        /*dd($user);*/ 
        // $todo = toDo::where('assignedTo', '=' , $user->assignedTo)->get();
        dd($todo);
        // $this->toDo=$this->toDo->where('assignedTo',$user||'reAssignedTo',$user)->get();
        return view('Admin/TaskView/list',compact('todo'));
    }

    public function GetTaskDetail(Request $request)
    {
        $user=@Auth::user()->id;
        $this->toDo=$this->toDo->where('id',$request->id)->first();
        $id=$this->toDo->id;
        
        return view('Admin/TaskView/Detail')->with('todo',$this->toDo);
    }
}
