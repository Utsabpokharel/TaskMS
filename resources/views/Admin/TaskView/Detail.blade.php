@extends('Admin.layouts.master')
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
                        <li><a class="parent-item" href="">task</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Detail</li>
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
                                <li class="list-group-item">
                                    <b>Title </b>
                                    <div class="profile-desc" style="color:lightgreen">{{$todo->title}}</div>
                                </li>

                                <li class="list-group-item">
                                    <b>Description</b>
                                    <div class="profile-desc" style="color:lightgreen">{!!$todo->description !!}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Assigned Date </b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->assignedDate}}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Assigned To </b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->employee['name']}}</div>
                                </li>
                                @if($todo->CompletedDate)
                                <li class="list-group-item">
                                    <b>Completed Date</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->CompletedDate}}</div>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <b>Assigned By</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->superadmin['name']}}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Dead Line</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->DeadLine}}</div>
                                </li>
                            @if($todo->reassignedto)
                                    <li class="list-group-item">
                                    <b>Re-Assigned To</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->reassignto['name']}}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Re-Assigned Date</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->reAssignedDate}}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Re-Assigned Deadline</b>
                                    <div class="profile-desc-item " style="color:lightgreen">{{$todo->reDeadLine}}</div>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <div class="profile-desc-item " style="color:lightgreen">
                                        @if($todo->status==0)
                                        Pending
                                        @else
                                        Completed
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Remarks</b>
                                    <div class="profile-desc" style="color:lightgreen">
                                        {!! $todo->remarks !!}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Add Comment</b>
                                    <form  action="{{route('comment.store')}}" method="post" id="form_sample_2"
                                           class="form-horizontal" enctype="multipart/form-data" autocomplete="on">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group row  margin-top-20">
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <textarea name="comment" class="form-control" cols="30"
                                                              required rows="10" id="editor"></textarea>
                                                    <input type="hidden" value="{{Auth::user()->id}}" name="User_id">
                                                    <input type="hidden" value="{{$todo->id}}" name="Todo_id">
                                                </div>
                                            </div>
                                        </div>
                                        <div >
                                            <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                        </div>
                                    </form>
                                </li>
                                <li class="list-group-item">
                                    <b> Comment</b>
                                    @foreach($comment as $comment)
                                        <div class="profile-desc-">
                                            <br>
                                            <hr>
                                            {{$comment->created_at}}
                                            <br>
                                            <img style="width:30px;" src="{{asset('Uploads/users/thumbnails/'.$comment->User['image'])}}">
                                            {{$comment->User['name']}}:
                                            <br>
                                            {!! $comment->Comment !!}

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
