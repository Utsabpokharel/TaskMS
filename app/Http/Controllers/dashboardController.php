<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\role;
use App\allUser;
use App\toDo;

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
        /*dd($user_id);*/
        $pending=toDo::where('assignedTo',$user_id)->where('status','0')->get()->count();
        $completed=toDo::where('assignedTo',$user_id)->where('status','1')->get()->count();
        $all=toDo::get()->where('assignedTo',$user_id)->count();
        // $this->Todo=$this->Todo->get();
        $todo = toDo::orderBy('id','desc')->get();
        $roles = role::orderBy('id','desc')->where('id',$user)->first();
        // $this->Roles=$this->Roles->where('id',$user)->first();
        $admin_id = role::where('name', '=', 'admin')->first();       
        $emp_id = role::where('name', '=', 'employee')->first();
        $admins = allUser::where('role_id', '=', $admin_id->id)->get()->count();       
        $employee = allUser::where('role_id', '=', $emp_id->id)->get()->count();
        return view('Admin/index',compact('pending','completed','all','todo','roles','admins','employee'));
      
    }
}
