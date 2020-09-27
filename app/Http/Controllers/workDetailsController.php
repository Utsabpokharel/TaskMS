<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workDetail;
use App\Http\Requests\workValidator;

class workDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(workValidator $request)
    {        
        $wrk = new workDetail([
            'user_id' => $request->user_id,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'projects' => $request->projects            
       ]);
       $data = $wrk->save();
        
        if($data){
            return redirect()->back()->with('success','Work Details added successfully !!!');
        }else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
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
        $wrk = workDetail::findOrFail($id);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(workValidator $request, $id)
    {
        $wrk = workDetail::find($id);
        $wrk->experience = $request->experience;
        $wrk->skills = $request->skills;
        $wrk->projects = $request->projects;
        
        $update = $wrk->save();
        if($update){
            return redirect()->back()->with('success','Work details updated successfully');
        }else{
           return redirect()->back()->with('error','Errors Occurred !!!');
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
        //
    }
}
