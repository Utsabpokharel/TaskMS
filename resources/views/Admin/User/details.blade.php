@extends('Admin.Layouts.master')
@section('main_content')
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{$userDetail->name}} - Profile</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">User Profile Details</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card card-topline-aqua">
                        <div class="card-body padding height-9">
                            <div class="row">
                                <div class="profile-userpic">
                                    <img src="{{asset('Uploads/UserImage/'.$userDetail->image )}}"
                                        class="img-responsive" alt=""></div>
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">{{$userDetail->name}}</div>
                                <div class="profile-usertitle-job"> {{strtoupper($userDetail->roles->name)}}</div>
                                <div class="profile-usertitle-email">Email : {{($userDetail->email)}} </div>
                                <div class="profile-usertitle-job">Joined Date
                                    : {{strtoupper($userDetail->joined_date)}}</div>

                            </div>

                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->

                            <!-- END SIDEBAR BUTTONS -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Personal Details</header>
                        </div>
                        <div class="card-body padding height-9">
                            <div class="profile-desc">
                                {{$personalDetail ?  $personalDetail->about : 'Profile Not Updated'}}
                            </div>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Current Address</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$personalDetail ?  $personalDetail->address1 : 'Profile Not Updated'}}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Permanent Address</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$personalDetail ?  $personalDetail->address2 : 'Profile Not Updated'}}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender </b>
                                    <div class="profile-desc-item pull-right">
                                        {{$userDetail ?  $userDetail->gender : 'Profile Not Updated'}}
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <b>Position in Company</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$userDetail ?  $userDetail->position : 'Profile Not Updated'}}
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <b>Main Department</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$userDetail ?  $userDetail->department['main_dept']: 'Profile Not Updated'}}
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <b>Sub-Department</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$userDetail ?  $userDetail->department['sub_dept'] : 'Profile Not Updated'}}
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <b>Contact No.</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$personalDetail ? $personalDetail->phone1.' and  '.$personalDetail->phone2 : 'Profile Not Updated'}}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth</b>
                                    <div class="profile-desc-item pull-right">
                                        {{$personalDetail ? $personalDetail->dob : 'Profile Not Updated'}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-head card-topline-aqua">
                                    <header>Education Details</header>
                                </div>
                                <div class="card-body padding height-9">

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Degree </b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->degree : 'Profile Not Updated'}}
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Board</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->board : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Faculty</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->faculty : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Institute Name</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->inst_name : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Institute Address</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->inst_address : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Passed Year</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->passed_year : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Division</b>
                                            <div class="profile-desc-item pull-right">
                                                {{ $educationDetail ? $educationDetail->division : 'Profile Not Updated'}}
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-head card-topline-aqua">
                                    <header>Work Details</header>
                                </div>
                                <div class="card-body padding height-9">

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b> Work Experience</b>
                                            <div class="profile-desc">
                                                {{ $workDetail ? $workDetail->experience : 'Profile Not Updated'}}
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <b> Skills </b>
                                            <div class="profile-desc">
                                                {{ $workDetail ? $workDetail->skills : 'Profile Not Updated'}}
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <b> Projects Completed</b>
                                            <div class="profile-desc">
                                                {{ $workDetail ? $workDetail->projects : 'Profile Not Updated'}}
                                            </div>
                                        </li>

                                        @if($personalDetail != null)
                                        <div class="profile-desc-item pull-right">
                                            <img src="{{asset('/Uploads/Citizenship/'.$personalDetail->ctzn_f)}}" alt=""
                                                width="auto" height="100px">
                                        </div>
                                        <br>
                                        <div class="profile-desc-item pull-right">
                                            <img src="{{asset('/Uploads/Citizenship/'.$personalDetail->ctzn_b)}}" alt=""
                                                width="auto" height="100px">
                                            <!-- <a href="{{asset('/Uploads/Citizenship/'.$personalDetail->ctzn_b)}}"> {{$personalDetail->ctzn_b}}</a> -->

                                        </div>
                                        @else
                                        <div class="profile-desc-item pull-right"><i>Profile Not Updated</i></div>

                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->

</div>
<!-- end page container -->
@endsection
