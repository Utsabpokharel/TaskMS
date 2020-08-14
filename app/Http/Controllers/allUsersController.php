<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\allUser;
use App\role;
use App\department;
use App\Http\Requests\userValidator;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserCreateMail;
use Illuminate\Support\Facades\Mail;
// use Auth;

class allUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = allUser::orderBy('id', 'desc')->get();
        return view('Admin.User.view',compact('users'));
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
        return view('Admin.User.create',compact('roles','depart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userValidator $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "User-".time() .'.'. $image->getClientOriginalExtension();           
            $image->move('Uploads/UserImage/',$name);            
        }
        $user = new allUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id ? $request->role_id : '',
            'gender' => $request->gender,
            'department_id' => $request->department_id,
            'position' => $request->position,
            'joined_date' => $request->joined_date,
            'sub_department' => $request->sub_department,            
            'image' => $name,           
        ]);
        $users = $user->save();
        // Mail::send(new UserCreateMail());
        Mail::to($user->email)->send(new UserCreateMail('$user->name'));
       
        if($users){
            return redirect()->route('user.index')->with('success','New User Created Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = allUser::findOrFail($id);
        $roles = role::all();
        $depart = department::all();
        return view('Admin.User.edit',compact('users','roles','depart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userValidator $request, $id)
    {
        $user = allUser::find($id);
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/UserImage/' . $user->image);
            }
            $featured = $request->file('image');
            $name = time().'.'. $featured->getClientOriginalExtension();
            $featured->move('Uploads/UserImage/',$name); 

            $user->image = $name;
        }else{
            $user->image = $user->image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->gender = $request->gender;
        $user->department_id = $request->department_id;
        $user->position = $request->position;
        $user->joined_date = $request->joined_date;
        $user->sub_department = $request->sub_department;
        $update = $user->save();
        if($update){
            return redirect()->route('user.index')->with('success','Users details updated successfully');
        }else{
            return redirect()->back()->with('error', 'Some error occured while updating Admin'); 
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
        $users = allUser::findOrFail($id);
        $users->delete();
        return redirect()->route('user.index')->with('success', 'Selected User has been deleted');
    }
}
