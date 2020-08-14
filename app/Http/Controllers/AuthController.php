<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\allUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Http\Controllers\Input;
// use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }  
 
    public function registration()
    {
        return view('auth.register');
    }
     
    public function postLogin(Request $request)
    {
        // dd($request);
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        // $credentials = array(
        //     'email'     => Input::get('email'),
        //     'password'  => Input::get('password')
        // );
        // dd($credentials);
        if(Auth::attempt($credentials)) {
            // Authentication passed...
            // dd('success!!!!');
            return redirect()->intended('admin/index');
        }
        // return Redirect::to("/")->withError('Oops! You have entered invalid credentials');
        // dd('oops error!!! Not Valid Credentials');
        return redirect()->back()->with('warning','Oops!!! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:all_users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("home")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('home');
      }
       return Redirect::to('signin')->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {
      return allUser::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
