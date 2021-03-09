@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Leave</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('leave.index')}}">My Leave</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Leave</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Edit Leave</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                            data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <form action="{{ route('leave.update',$leave->id)}}" id="form_sample_1" class="form-horizontal"
                            method="post" autocomplete="on" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Leave Type
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select
                                            class="form-control input-height @error('leave_type') is-invalid @enderror"
                                            name="leave_type">
                                            <option value="{{$leave->id}}" selected>{{$leave->leavetype['leavetype']}}
                                            </option>
                                            <option value="" disabled>Select Leave Type</option>
                                            @foreach($leavetype as $type)
                                            <option value="{{$type->id}}">{{$type->leavetype}}</option>
                                            @endforeach
                                        </select>
                                        @error('leave_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">From
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="input-append date form_date col-md-5" data-date-format="yyyy-mm-dd">
                                        <input class="@error('from') is-invalid @enderror" size="40" type="text"
                                            required readonly name="from" value="{{old('from',$leave->from)}}">
                                        <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">To
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="input-append date form_date col-md-5" data-date-format="yyyy-mm-dd">
                                        <input class="@error('to') is-invalid @enderror" size="40" type="text" readonly
                                            required name="to" value="{{old('to',$leave->to)}}">
                                        <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Leave Reason
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <textarea name="leave_reason" required placeholder="Enter Leave Reason"
                                            class="form-control textarea input-height @error('leave_reason') is-invalid @enderror"
                                            rows="5">{{old('leave_reason',$leave->leave_reason)}}</textarea>
                                        @error('leave_reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--Applied By--}}
                                <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                    name="applied_by" />
                                {{--End--}}
                                {{--Employee_id--}}
                                <input type="hidden" class="form-control" value="{{Auth::user()->emp_id}}" required
                                    readonly name="employee_id" />
                                {{--End--}}

                                {{--Assigned date--}}
                                <input type="hidden" class="form-control" value="{{$d}}" required readonly
                                    name="applied_on" />
                                {{-- End--}}

                            </div>
                            {{--End--}}

                            {{--Status--}}
                            <div>
                                <input type="hidden" class="form-control" value="Pending" required readonly
                                    name="status" />
                            </div>
                            {{--End--}}
                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info m-r-20">Update</button>
                                        <a class="btn btn-default" href="{{ route('leave.index')}}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
