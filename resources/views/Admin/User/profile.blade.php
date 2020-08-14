@extends('Admin.Layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Your Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>

                        <li class="active">User Profile</li>
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
                                        <img src="{{asset('Uploads/UserImage/'.Auth::user()->image )}}"
                                             class="img-responsive" alt=""></div>
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">{{Auth::user()->name}}</div>                           
                                    <div class="profile-usertitle-job"> {{strtoupper(Auth::user()->roles->name)}}</div>
                                    <div class="profile-usertitle-email">Email : {{(Auth::user()->email)}} </div>
                                    <div class="profile-usertitle-job">Joined Date/Time
                                        : {{strtoupper(Auth::user()->created_at)}}</div>

                                </div>
                                <ul class="list-group list-group-unbordered">
                                    @if(Auth::user()->roles->name == 'super_admin')
                                        <li class="list-group-item">
                                            <b>Total Admins</b> <a class="pull-right">{{$admin}}</a>
                                        </li>
                                       
                                        <li class="list-group-item">
                                            <b>Total Employee</b> <a class="pull-right">{{$employee}}</a>
                                        </li>
                                    @endif


                                </ul>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <a href="{{route('update_profile')}}">
                                        <button type="button" class="btn btn-circle green btn-sm">Update
                                            Profile
                                        </button>
                                    </a>
                                    {{--<button type="button" class="btn btn-circle red btn-sm">Message</button>--}}
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                        </div>                        
                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Personal Details</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        <div class="profile-desc">
                                        {{$prsnl ? $prsnl->about : 'Update Profile'}}
                                        </div>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Current Address</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl ? $prsnl->address1 : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Permanent Address</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl ? $prsnl->address2 : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="profile-desc-item pull-right">{{strtoupper(Auth::user()->gender)}}</div>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Position in Company</b>
                                                <div class="profile-desc-item pull-right">{{Auth::user()->position}}</div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                                <b>Main Department</b>
                                                <div class="profile-desc-item pull-right">{{Auth::user()->department->main_dept}}</div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                                <b>Sub-Department</b>
                                                <div class="profile-desc-item pull-right">{{Auth::user()->department->sub_dept}}</div>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Contact No.</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl ? $prsnl->phone1.' and  '.$prsnl->phone2 : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date of Birth</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl ? $prsnl->dob : 'Update Profile'}}</div>
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
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->degree : 'Update Profile'}}</div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                                <b>Board</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->board : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Faculty</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->faculty : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Institute Name</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->inst_name : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Institute Address</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->inst_address : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Passed Year</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->passed_year : 'Update Profile'}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Division</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->division : 'Update Profile'}}</div>
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
                                                {{ $wrk ? $wrk->experience : 'Please Update Your Profile'}}
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                             <b>  Skills </b>
                                                <div class="profile-desc">
                                                {{ $wrk ? $wrk->skills : 'Please Update Your Profile'}}
                                                </div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                             <b> Projects Completed</b>
                                                <div class="profile-desc">
                                                {{ $wrk ? $wrk->projects : 'Please Update Your Profile'}}
                                                </div>
                                            </li>                                                                                                                                  
                                                                                       
                                            <li class="list-group-item">
                                            <b>Personal Documents</b>
                                            @if($prsnl != null)
                                                <div class="profile-desc-item pull-right">
                                                <img src="{{asset('/Uploads/Citizenship/'.$prsnl->ctzn_f)}}"
                                                         alt="" width="auto" height="100px">                                                         
                                                </div>  

                                                 <div class="profile-desc-item pull-right">
                                                <img src="{{asset('/Uploads/Citizenship/'.$prsnl->ctzn_b)}}"
                                                         alt="" width="auto" height="100px">
                                                        <!-- <a href="{{asset('/Uploads/Citizenship/'.$prsnl->ctzn_b)}}"> {{$prsnl->ctzn_b}}</a> -->
                                                         
                                                </div>                                                                     
                                            @else
                                                <div class="profile-desc-item pull-right">Not Available</div>
                                                
                                            @endif
                                            </li> 
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