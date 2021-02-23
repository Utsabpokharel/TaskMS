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
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                        <a class="parent-item pull-right btn btn-sm btn-circle blue"
                            href="{{ route('task.index')}}">Back</a>
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
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->assignedDate}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Assigned To</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->employee['name']}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Assigned By</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$tsk->superadmin['name']}}</div>
                            </li>

                            <li class="list-group-item">
                                <b>DeadLine</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->deadline}}</div>
                            </li>
                            @if($tsk->reAssignedTo)

                            <li class="list-group-item">
                                <b>ReAssigned Date </b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->reAssignedDate}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>ReAssigned To</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$tsk->reassignto['name']}}</div>
                            </li>

                            <li class="list-group-item">
                                <b>ReAssigned By</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    <td>{{$tsk->ReAssignedBy}}
                                </div>
                            </li>

                            <li class="list-group-item">
                                <b>Re-DeadLine</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->reDeadline}}</div>
                            </li>

                            <li class="list-group-item">
                                <b>Reason for ReAssign</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->reason}}</div>
                            </li>
                            @endif

                            <li class="list-group-item">
                                <b>Task Priority</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->task_priority}}
                                </div>
                            </li>



                            @if($tsk->fileUpload !=[])
                            <li class="list-group-item">
                                <b>File Upload</b>
                                <!-- <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->fileUpload}}</div> -->
                                <div class="profile-desc-item pull-right">
                                    <a href="{{asset('/Uploads/ToDoFiles/'.$tsk->fileUpload)}}">
                                        {{$tsk->fileUpload}}</a>

                                </div>
                            </li>
                            @else
                            <li class="list-group-item">
                                <b>File Upload</b>
                                <div class="profile-desc-item pull-right" style="color:gray">No Files Attached</div>
                            </li>
                            @endif
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
                            @if($tsk->completedDate)
                            <li class="list-group-item">
                                <b>Completed Date</b>
                                <div class="profile-desc-item pull-right" style="color:gray">{{$tsk->completedDate}}
                                </div>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <b>Remarks</b>
                                <div class="profile-desc-item pull-right" style="color:gray">
                                    {{$tsk->remarks}}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <b>Add Comment</b>
                                <form action="{{route('comment.store')}}" method="post" id="form_sample_2"
                                    class="form-horizontal" enctype="multipart/form-data" autocomplete="on">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group row  margin-top-20">
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="Comment" class="form-control" cols="30" required
                                                    rows="10" id="editor"></textarea>
                                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                                <input type="hidden" value="{{$tsk->id}}" name="todo_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                    </div>
                                </form>
                            </li>
                            <li class="list-group-item">
                                <h2><b> Comments</b></h2>
                                @foreach($comment as $comment)
                                <div class="profile-desc-">
                                    <img style="width:30px;"
                                        src="{{asset('Uploads/UserImage/'.$comment->User['image'])}}">
                                    <b>{{$comment->User['name']}} :</b> <i>{!! $comment->Comment !!} </i>
                                    <br>
                                    <i class="pull-right"> {{$comment->created_at}}</i>
                                    <hr>
                                </div>
                                @endforeach
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
