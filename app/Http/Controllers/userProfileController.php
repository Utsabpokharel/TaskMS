<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\role;
use App\allUser;
use App\educationDetail;
use App\workDetail;
use App\personalDetail;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use App\Http\Requests\userValidator;


class userProfileController extends Controller
{
    public function auth_prof()
    {
        // $users = allUser::findOrFail($id);

        $admin_id = role::where('name', '=', 'admin')->first();
        $emp_id = role::where('name', '=', 'employee')->first();

        $admin = allUser::where('role_id', '=', $admin_id->id)->get()->count();
        $employee = allUser::where('role_id', '=', $emp_id->id)->get()->count();

        $educ =  educationDetail::where('user_id', '=', Auth::user()->id)->first();
        $wrk =  workDetail::where('user_id', '=', Auth::user()->id)->first();
        $prsnl =  personalDetail::where('user_id', '=', Auth::user()->id)->first();
        // $degree = Degree::a();
        return view('Admin/User/profile', compact('admin', 'employee', 'educ', 'wrk', 'prsnl'));
    }

    public function prof_update(Request $request)
    {
        if ($request->isMethod('get')) {
            $educ =  educationDetail::where('user_id', '=', Auth::user()->id)->first();
            $wrk =  workDetail::where('user_id', '=', Auth::user()->id)->first();
            $prsnl =  personalDetail::where('user_id', '=', Auth::user()->id)->first();
            // dd($educ);
            return view('Admin/User/updateProfile', compact('educ', 'wrk', 'prsnl'));
        }
    }

    public function photo_update(Request $request, $id)
    {
        $user = allUser::findOrFail($id);
        $request->validate([
            'image' => 'required |image |max:2500 '
        ]);
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                unlink(public_path() . '/Uploads/UserImage/' . $user->image);
            }
            $new_img = $request->file('image');
            $name = "User-" . time() . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('Uploads/UserImage/', $name);
            $user->image = $name;
        } else {
            $user->image = Auth::user()->image;
        }
        $update = $user->save();
        if ($update) {
            return redirect()->back()->with('success', 'User Photo updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        allUser::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

        Auth::logout();

        return redirect()->route('/login')->with('success', 'Your Password has been changed,Please Login again.');
        Auth::logoutOtherDevices(request('password'));
    }
}
