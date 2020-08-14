<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personalDetail;

class personalDetailsController extends Controller
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
    public function store(Request $request)
    {
        // dd($request);
        if ($request->hasFile('ctzn_f')) {
            $image = $request->file('ctzn_f');
            $name = "CTZN-".time().'.'. $image->getClientOriginalExtension();           
            $image->move('Uploads/Citizenship/',$name); 
            // $prsnl->ctzn_f = $name;          
        }
        // dd($name);
        if ($request->hasFile('ctzn_b')) {
            $image = $request->file('ctzn_b');
            $bck = "CTZN-".time() .'.'. $image->getClientOriginalExtension();           
            $image->move('Uploads/Citizenship/',$bck);            
        }
        $prsnl = new personalDetail([            
            'user_id' => $request->user_id,
            'about' => $request->about,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'dob' => $request->dob,               
       ]);
       $prsnl->ctzn_f = $name;
       $prsnl->ctzn_b =$bck; 
    //    dd($prsnl);
       $data = $prsnl->save();
    //    dd($data);
        
        if($data){
            return redirect()->back()->with('success','Personal Details added successfully !!!');
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
        $prsnl = personalDetail::findOrFail($id);
        return redirect()->back();
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
        $prsnl = personalDetail::find($id);
        $prsnl->user_id = $request->user_id;
        $prsnl->address1 = $request->address1;
        $prsnl->address2 = $request->address2;
        $prsnl->phone1 = $request->phone1;
        $prsnl->phone2 = $request->phone2;
        $prsnl->dob = $request->dob;
        $update = $prsnl->save();
        if($update){
            return redirect()->back()->with('success','Personal details updated successfully');
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
