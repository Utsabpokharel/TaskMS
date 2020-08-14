<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\Http\Requests\departmentValidator;

class departmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depart = department::orderBy('id', 'desc')->get();
        return view('Admin.Department.view',compact('depart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(departmentValidator $request)
    {
        $create = $request->all();       
        $depart = department::create($create);
        if($depart){
            return redirect()->route('department.index')->with('success','New Department Created Successfully');
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
        $depart = department::findOrFail($id);
        return view('Admin.Department.edit',compact('depart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(departmentValidator $request, $id)
    {
        $department = department::find($id);

        $department->main_dept = $request->main_dept;
        $department->sub_dept = $request->sub_dept;
        $department->description = $request->description;
        
        $update = $department->save();
        
        if(!$update){
            return redirect()->back()->with('error','Sorry the changes couldn\'t be made');
        }else{
            return redirect()->route('department.index')->with('success','Department updated successfully');
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
        $depart = department::findOrFail($id);
        $depart->delete();

        return redirect()->route('department.index')->with('success', 'Selected department has been deleted');
    }
}
