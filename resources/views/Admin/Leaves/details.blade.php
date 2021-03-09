@extends('Admin.Layouts.master')
@section('main_content')


<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Leave Details</div>
                </div>

                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('task.index')}}">Leave</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Details</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-head card-topline-aqua">
                        <header>Leave Detail</header>
                        @if (Auth::user()->role_id==1)
                        <a class="parent-item pull-right btn btn-sm btn-circle blue"
                            href="{{ route('leave.index')}}">Back</a>
                        @else
                        <a class="parent-item pull-right btn btn-sm btn-circle blue"
                            href="{{ route('employeeLeaveView')}}">Back</a>
                        @endif

                    </div>
                    <div class="card-body padding height-9">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item left">
                                <b>Employee ID</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->employee_id}}
                                </div>
                            </li>
                            <li class="list-group-item left">
                                <b>Applied By</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->applied['name']}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Leave From</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->from}}</div>
                            </li>
                            <li class="list-group-item">
                                <b>Upto</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->to}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Leave Type</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$leave->leavetype['leavetype']}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Leave Reason</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->leave_reason}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Applied On</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->applied_on}}
                                </div>
                            </li>
                            @if($leave->checked_by)

                            <li class="list-group-item">
                                <b>Checked By</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$leave->checked['name']}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Checked On</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$leave->checked_on}}</div>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <b>Status</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    @if($leave->status=='0')
                                    <td><i class="btn-danger">Not-Approved</i></td>
                                    @elseif($leave->status=='1')
                                    <td><i class="btn-success"> Approved</i></td>
                                    @else
                                    <td>
                                        <i class="btn-warning"> Pending</i>
                                    </td>
                                    @endif
                                </div>
                            </li>
                            @if($leave->admin_remarks)
                            <li class="list-group-item">
                                <b>Remarks</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    <td>{{$leave->admin_remarks}}
                                </div>
                            </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- end page content -->


@endsection
