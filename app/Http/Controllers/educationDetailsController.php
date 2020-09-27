<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\educationDetail;
use App\Http\Requests\educationValidator;

class educationDetailsController extends Controller
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
    public function store(educationValidator $request)
    {
        $edu = new educationDetail([
            'user_id' => $request->user_id,
            'inst_name' => $request->inst_name,
            'inst_address' => $request->inst_address,
            'degree' => $request->degree,
            'faculty' => $request->faculty,
            'board' => $request->board,
            'passed_year' => $request->passed_year,
            'division'=> $request->division
       ]);
       $data = $edu->save();
        // $data = User_education_detail::create($request->all());
        if($data){
            return redirect()->back()->with('success','Education Details added successfully !!!');
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
        $educ = educationDetail::findOrFail($id);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(educationValidator $request, $id)
    {
        $educ = educationDetail::find($id);

        $educ->user_id = $request->user_id;
        $educ->inst_name = $request->inst_name;
        $educ->inst_address = $request->inst_address;
        $educ->degree = $request->degree;
        $educ->faculty = $request->faculty;
        $educ->board = $request->board;
        $educ->passed_year = $request->passed_year;
        $educ->division = $request->division;
        $update = $educ->save();
        if($update){
            return redirect()->back()->with('success','Education details updated successfully');
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
