<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\role;
use App\allUser;
use App\educationDetail;
use App\workDetail;
use App\personalDetail;
use Illuminate\Support\Facades\Auth;

class userProfileController extends Controller
{
    public function auth_prof()
    {
        $users = allUser::findOrFail($id);

        $admin_id = role::where('name', '=', 'admin')->first();        
        $emp_id = role::where('name', '=', 'employee')->first();

        $admin = allUser::where('role_id', '=', $admin_id->id)->get()->count();       
        $employee = allUser::where('role_id', '=', $emp_id->id)->get()->count();

        $educ =  educationDetail::where('user_id','=',Auth::user()->id)->first();
        $wrk =  workDetail::where('user_id','=',Auth::user()->id)->first();
        $prsnl =  personalDetail::where('user_id','=',Auth::user()->id)->first();
        // $degree = Degree::a();
        return view('Admin/User/profile', compact('users','admin','employee','educ','wrk','prsnl'));
    }

    public function prof_update(Request $request)
    {
        if ($request->isMethod('get')) {           
            $educ =  educationDetail::where('user_id','=',Auth::user()->id)->first();
            $wrk =  workDetail::where('user_id','=',Auth::user()->id)->first();
            $prsnl =  personalDetail::where('user_id','=',Auth::user()->id)->first();
            // dd($educ);
            return view('Admin/User/updateProfile', compact('educ','wrk','prsnl'));
        }
    }

    public function update_user(updatePwd $request, $id)
    {
        $user = allUser::findOrFail($id);
        // $old_password = $user->password;
        // $current = $request->old_password;
        // $new_pwd = $request->password;
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/UserImage/' . $user->image);
            }
            $new_img = $request->file('image');
            $name = time() . $new_img->getClientOriginalExtension();
            $image->move('Uploads/UserImage/',$name);
            $user->image = $name;    
        }else{
            $user->image = Auth::user()->image;
        }        
    }
}
