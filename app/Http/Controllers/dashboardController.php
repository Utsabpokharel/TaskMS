<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\role;
use App\allUser;
use App\toDo;
use App\Notification;

class dashboardController extends Controller
{
    protected $todo=null;
    protected $roles=null;

    public function __construct(toDo $todo,role $roles)
    {
        $this->toDo=$todo;
        $this->role=$roles;
    }

    public function index(){

        // $bookings = Booking::orderBy('id','desc')->get();
        // return view('Admin/index');  
        $user=@Auth::user()->role_id;
        $user_id=@Auth::user()->id;
        // dd($user);
        $pending=toDo::where('assignedTo',$user_id)->orWhere('reAssignedTo',$user)->where('status','=','0')->get()->count();
        // dd($pending);
        $completed=toDo::where('assignedTo',$user_id)->where('status','=','1')->get()->count();

        $received = toDo::where('assignedTo',$user_id)->get()->count();
        // dd($completed);
        $all=toDo::where('assignedTo',$user_id)->orWhere('reAssignedTo',$user_id)->get()->count();
        // $this->Todo=$this->Todo->get();
        $todo = toDo::orderBy('id','desc')->paginate(5);
        $roles = role::orderBy('id','desc')->where('id',$user)->first();
        // $this->Roles=$this->Roles->where('id',$user)->first();
        $admin_id = role::where('name', '=', 'admin')->first();       
        $emp_id = role::where('name', '=', 'employee')->first();
        $admins = allUser::where('role_id', '=', $admin_id->id)->get()->count();       
        $employee = allUser::where('role_id', '=', $emp_id->id)->get()->count();

        $allUsers =allUser::orderBy('id','desc')->paginate(3);
        $users=allUser::orderBy('id','desc')->get()->count();
        $task =toDo::orderBy('id','desc')->get()->count();
        $admin_task =toDo::orderBy('id','desc')->where('assignedBy',$user_id)->get()->count();
        // dd($admin_task);
        return view('Admin/index',compact('pending','completed','all','todo','roles','admins','employee',
        'users','task','admin_task','received','allUsers'));
      
    }

    public function notification(){
        $notification=Notification::all();
    }
}
