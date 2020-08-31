<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\toDo;
use App\allUser;
use App\comment;

class employeeController extends Controller
{
    
    protected $Todo = null;
    protected $All_User = null;
    protected $Comment = null;

    public function __construct(toDo $Todo, allUser $All_User, comment $Comment)
    {
        $this->toDo = $Todo;
        $this->allUser = $All_User;
        $this->Comment = $Comment;
    }

    public function GetList()
    {
        $user=@Auth::user()->id;
        /*dd($user);*/
        $this->toDo=$this->toDo->where('assignedTo',$user)
                                ->orWhere('reAssignedTo',$user)->get();
        
        // dd($this->toDo);
        return view('Admin/TaskView/list')->with('todo',$this->toDo);
    }

    public function GetTaskDetail(Request $request)
    {
        $user=@Auth::user()->id;
        $this->toDo=$this->toDo->where('id',$request->id)->first();
        $id=$this->toDo->id;
        $comment=comment::where('todo_id',$id)->get();
        return view('Admin/TaskView/Detail',compact('comment'))->with('tsk',$this->toDo);
    }

    public function GetAdminList()
    {
        $user=@Auth::user()->id;
        /*dd($user);*/
        $this->toDo=$this->toDo->where('assignedBy',$user)->get();
        
        // dd($this->toDo);
        return view('Admin/TaskView/list')->with('todo',$this->toDo);
    }

    public function GetAdminTaskDetail(Request $request)
    {
        $user=@Auth::user()->id;
        $this->toDo=$this->toDo->where('id',$request->id)->first();
        $id=$this->toDo->id;
        $comment=comment::where('todo_id',$id)->get();
        return view('Admin/TaskView/Detail',compact('comment'))->with('tsk',$this->toDo);
    }
}
