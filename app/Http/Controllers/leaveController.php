<?php

namespace App\Http\Controllers;

use App\allUser;
use App\leave;
use App\leaveType;
use App\Mail\LeaveApplyMail;
use App\Mail\LeaveApproveMail;
use App\Mail\LeaveRejectMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class leaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = leave::orderBy('id', 'desc')->get();
        $d = Carbon::today()->toDateString();

        return view('Admin.Leave Management.allLeaves', compact('leave', 'd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavetype = leaveType::all();
        $d = Carbon::now();
        return view('Admin.Leaves.create', compact('leavetype', 'd'));
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
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'leave_reason' => 'required',
        ]);
        $create = $request->all();
        $leave = leave::create($create);
        $email = DB::table('all_users')->where('role_id', '1')->select('email')->get();
        // dd($email);
        // $List = [];
        // $i = 0;

        // Fill the array element
        // foreach ($email as $contact) {
        //     $List[$i] = $contact->email;
        //     $i++;
        // }
        // dd($List);
        Mail::to($email)->send(new LeaveApplyMail());
        if ($leave) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('leave.index')->with('success', 'Leave has been applied Successfully');
            } else {
                return redirect()->route('employeeLeaveView')->with('success', 'Leave has been applied Successfully');
            }
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
        $leave = leave::findOrFail($id);
        return view('Admin.Leaves.details', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = leave::findOrFail($id);
        $leavetype = leaveType::all();
        $d = Carbon::now();
        return view('Admin.Leaves.edit', compact('leave', 'leavetype', 'd'));
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
        $leave = leave::find($id);
        $request->validate([
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'leave_reason' => 'required | min:10',
        ]);
        $leave->leave_type = $request->leave_type;
        $leave->from = $request->from;
        $leave->to = $request->to;
        $leave->leave_reason = $request->leave_reason;

        $update = $leave->save();

        if (!$update) {
            return redirect()->back()->with('error', 'Sorry the changes couldn\'t be made');
        } else {
            return redirect()->route('employeeLeaveView')->with('success', 'Leave Details Updated Successfully !!!');
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
    public function approve(Request $request, $id)
    {
        $leave = leave::findOrFail($id);
        $leave->status = '1';
        $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            $applied_usr = $leave->applied_by;
            $assig_user = allUser::find($applied_usr);
            // dd($update);
            Mail::to($assig_user->email)->send(new LeaveApproveMail());
            return redirect()->route('leave.index')->with('success', 'Leave Approved Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function reject(Request $request, $id)
    {
        $leave = leave::findOrFail($id);
        $leave->status = '0';
        $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            $applied_usr = $leave->applied_by;
            $assig_user = allUser::find($applied_usr);
            // dd($update);
            Mail::to($assig_user->email)->send(new LeaveRejectMail());
            return redirect()->route('leave.index')->with('success', 'Leave Rejected Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function employeeLeave()
    {
        $leave = leave::where('applied_by', Auth::user()->id)->get();
        $d = Carbon::today()->toDateString();

        return view('Admin.Leaves.view', compact('leave', 'd'));
    }
    public function pending()
    {
        $leave = leave::where('status', 'Pending')->get();
        $d = Carbon::today()->toDateString();

        return view('Admin.Leave Management.pending', compact('leave', 'd'));
    }
    public function leaveApproved()
    {
        $leave = leave::where('status', '1')->get();
        $d = Carbon::today()->toDateString();

        return view('Admin.Leave Management.approved', compact('leave', 'd'));
    }
    public function leaveRejected()
    {
        $leave = leave::where('status', '0')->get();
        $d = Carbon::today()->toDateString();

        return view('Admin.Leave Management.notApproved', compact('leave', 'd'));
    }
}
