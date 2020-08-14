
@extends('Admin.Layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Task Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('task.index')}}">Tasks</a>&nbsp;<i
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
                            <header>Task Detail</header>
                        </div>
                        <div class="card-body padding height-9">
                            <ul class="list-group list-group-unbordered">
                           
                                <li class="list-group-item left">
                                    <b>Title </b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->title}}</div>
                                </li>

                                <li class="list-group-item">
                                    <b>Description</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->description}}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Assigned Date </b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->assignedDate}}</div>
                                </li>
                               
                                <li class="list-group-item">
                                    <b>Assigned To</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->employee['name']}}</div>
                                </li>

                                <li class="list-group-item">
                                    <b>Assigned By</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->assignedBy}}</div>
                                </li>

                                <li class="list-group-item">
                                    <b>DeadLine</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->deadline}}</div>
                                </li>
                               
                                
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">
                                    @if($tsk->status==0)
                                        <td>Pending</td>
                                        @elseif($tsk->status==1)
                                        <td>Completed</td>
                                        @else
                                        <td>Re-Assigned</td>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Remarks</b>
                                    <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$tsk->remarks}} 
                                    </div>
                                </li>   
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
