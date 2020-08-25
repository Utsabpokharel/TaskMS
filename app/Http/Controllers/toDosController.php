<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\role;
use App\department;
use App\toDo;
use App\allUser;
use App\Mail\TaskMail;
use App\Http\Requests\taskValidator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class toDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // $this->toDo = $this->toDo->get();
        $tasks = toDo::orderBy('id', 'desc')->get();
        $superAdmin = role::where('name', '=', 'super_admin')->first();
        $employee = role::where('name', '=', 'employee')->first();

        $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
        $employee = allUser::where('role_id', '=', $employee->id)->get();
        $tasks = toDo::orderBy('id', 'desc')->get();
        return view('Admin.Task.view',compact('tasks','employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        $depart = department::all();
        $d=Carbon::now();
        $superAdmin= role::where('name','=','super_admin')->first();
        $employee= role::where('name','=','employee')->first();

        $superAdmin= allUser::where('role_id','=',$superAdmin->id)->get();
        $employee= allUser::where('role_id','=',$employee->id)->get();

        return view('Admin.Task.create',compact('roles','depart','employee','d','superAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(taskValidator $request)
    {
        $todo = new toDo([
            'title' => $request->title,
            'description' => $request->description,            
            'user_id' => $request->user_id,
            'assignedDate' => $request->assignedDate,
            'completedDate' => $request->completedDate,
            'assignedTo' => $request->assignedTo,
            'assignedBy' => $request->assignedBy,
            'ReAssignedBy'=>$request->ReAssignedBy,
            'reAssignedTo' => $request->reAssignedTo,
            'reAssignedDate' => $request->reAssignedDate,
            'reDeadline' => $request->reDeadline,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'deadline' => $request->deadline,
            'task_priority' => $request->task_priority,
        ]);
        // dd($todo);
        // dd($todo->employee->email);
        if ($request->hasFile('fileUpload')) {
            $image = $request->file('fileUpload');
            $name = time() .'.'. $image->getClientOriginalExtension();           
            $image->move('Uploads/ToDoFiles/',$name);            
            $todo->fileUpload =$name;
        } 
        $todos = $todo->save(); 
        
        
    //    $todos =toDo::orderBy('assignedTo', 'desc')->get();
    //    dd($todos);
        Mail::to($todo->employee->email)->send(new TaskMail());  
       
        if($todos){
            return redirect()->route('task.index')->with('success','New Task Created Successfully');
        }else{
            return redirect()->back()->with('error','Oops!!! some error occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $tsk = toDo::orderBy('id', 'desc')->get();
        // $superAdmin = role::where('name', '=', 'super_admin')->first();
        // $employee = role::where('name', '=', 'employee')->first();

        // $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
        // $employee = allUser::where('role_id', '=', $employee->id)->get();
        // $tsk = toDo::orderBy('id', 'desc')->get();
        $tsk = toDo::findOrFail($id);
        return view('Admin.Task.details',compact('tsk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = toDo::findOrFail($id);
        $roles = role::all();
        $depart = department::all();
        $d=Carbon::now();
        $superAdmin= role::where('name','=','super_admin')->first();
        $employee= role::where('name','=','employee')->first();

        $superAdmin= allUser::where('role_id','=',$superAdmin->id)->get();
        $employee= allUser::where('role_id','=',$employee->id)->get();
        return view('Admin.Task.edit',compact('roles','depart','employee','d','superAdmin','tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(taskValidator $request, $id)
    {
        $tasks = toDo::find($id);
        
        // $this->toDo = $this->toDo->find($id);
        // if (!$this->toDo) {
        //     request()->session()->flash('error', 'Todos not found');
        //     return redirect()->route('task.index');
        // }
        // $data = $request->all();
        // $this->toDo->fill($data);
        // $success = $this->toDo->save();
        $update = $tasks->save();
        if ($update) {
            // request()->session()->flash('success', 'Todos list updated successfully');
            return redirect()->route('task.index')->with('success','Selected Task updated successfully');

        } else {
            // request()->session()->flash('error', 'sorry there was an error updating Todos list');
            return redirect()->back()->with('error','Sorry the changes couldn\'t be made');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $tasks = toDO::findOrFail($id);
        $tasks->delete();

        return redirect()->route('task.index')->with('success', 'Selected Task has been deleted');
    }

    public function pending(Request $request, $id)
    {
        $todo = toDo::findOrFail($id);
        $todo->status = 0;
        $todo->completedDate = null;
        $todo->update();
        return redirect()->back()->with('success', 'status changed');
    }

    public function complete(Request $request, $id)
    {
//      dd($request->all());

        $todo = toDo::findOrFail($id);
        $todo->status = 1;
        $todo->completedDate = date("Y-m-d H:i:s");
        $todo->update();
        return redirect()->back()->with('success', 'status changed');
    }

    public function reaassign($id)
    {
        $d=Carbon::now();
        // $this->toDo = $this->toDo->find($id);
        $todo = toDo::findOrFail($id);
        $superAdmin = role::where('name', '=', 'super_admin')->first();
        $employee = role::where('name', '=', 'employee')->first();

        $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
        $employee = allUser::where('role_id', '=', $employee->id)->get();
        
        return view('Admin.Task.reAssign',compact('d','superAdmin','employee','todo'));

    }

    public function ReAssign(Request $request, $id,allUser $thread)
    {
       
        $user=@Auth::user();
        $d=Carbon::now();
        $todo = toDo::findOrFail($id);
        $todo->reAssignedTo = $request->reAssignedTo;
        $todo->reAssignedDate = $request->reAssignedDate;
        $todo->reDeadline = $request->reDeadline;
        $todo->ReAssignedBy = $request->ReAssignedBy;
        $update = $todo->update();
        if ($update) {
            $assigned_usr = $todo->reAssignedTo;
            $assig_user = allUser::find($assigned_usr);
            Mail::to($assig_user->email)->send(new TaskMail());
            return redirect()->route('task.index', compact('d'))->with('success','Task Re-Assigned Successfully !!!');            
        } else {
            request()->session()->flash('error', 'sorry there was an error Re_Assigning Task');
        }
    }
}
