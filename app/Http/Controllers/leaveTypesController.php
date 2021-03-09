<?php

namespace App\Http\Controllers;

use App\leaveType;
use Illuminate\Http\Request;

class leaveTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = leaveType::orderBy('id', 'desc')->get();
        return view('Admin.LeaveType.view', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.LeaveType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leavetype' => 'required | max:20',
            'leavedays' => 'required',
            'description' => 'required',
        ]);
        $create = $request->all();
        $type = leaveType::create($create);
        if ($type) {
            return redirect()->route('leaveType.index')->with('success', 'New Leave Type Created Successfully');
        } else {
            return redirect()->back()->with('error', 'Oops!!! some error occurred');
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
        $type = leaveType::findOrFail($id);
        return view('Admin.LeaveType.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = leaveType::find($id);
        $request->validate([
            'leavetype' => 'required | max:20',
            'leavedays' => 'required',
            'description' => 'required',
        ]);
        $type->leavetype = $request->leavetype;
        $type->leavedays = $request->leavedays;
        $type->description = $request->description;
        $update = $type->save();

        if (!$update) {
            return redirect()->back()->with('error', 'Sorry the changes couldn\'t be made');
        } else {
            return redirect()->route('leaveType.index')->with('success', 'Leave Type is updated successfully');
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
        $type = leaveType::findOrFail($id);
        $type->delete();

        return redirect()->route('leaveType.index')->with('success', 'Selected Leave Type has been deleted');
    }
}
