<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\Http\Requests\roleValidator;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::orderBy('id', 'desc')->get();
        return view('Admin.Role.view',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Admin.Role.create');
        echo 'Sorry !!! This Feature is not available currently !!!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(roleValidator $request)
    {
        $create = $request->all();       
        $roles = role::create($create);
        if($roles){
            return redirect()->route('roles.index')->with('success','New Role Created Successfully');
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
        // $roles = role::findOrFail($id);
        // return view('Admin.Role.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(roleValidator $request, $id)
    {
        $roles = role::find($id);

        $roles->name = $request->name;       
        $roles->description = $request->description;
        
        $update = $roles->save();
        
    
        if(!$update){
            return redirect()->back()->with('error','Sorry the changes couldn\'t be made');
        }else{
            return redirect()->route('roles.index')->with('success','Role updated successfully');
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
        $roles = role::findOrFail($id);
        $roles->delete();

        return redirect()->route('roles.index')->with('success', 'Selected role has been deleted');
    }
}
