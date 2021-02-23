@extends('Admin.layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">ToDos</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('task.index')}}">ToDos</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Task Re-Assign </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header></header>
                    </div>
                    <div class="card-body" id="bar-parent2">
                        <form action="{{route('updateReassign',$todo->id)}}" method="post" id="form_sample_2"
                            class="form-horizontal" enctype="multipart/form-data" autocomplete="on">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" class="form-control" value="{{$d}}" required readonly
                                name="reAssignedDate" />
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="ReUser_id" />
                            <input type="hidden" class="form-control" value="{{Auth::user()->name}}" required readonly
                                name="ReAssignedBy" />
                    </div>
                    <div class="form-group row  margin-top-20">
                        <label class="control-label col-md-3">Re-Assigned TO
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <select class="form-control col-12 input-append" required name="reAssignedTo">
                                    <option value="{{ $todo->reAssignedTo }}" selected>
                                        {{ $todo->employee['name'] }}</option>
                                    <option value="" disabled>--Select Staffs--</option>
                                    @if(isset($employee))
                                    @foreach($employee as $employee_data)
                                    <option value="{{$employee_data->id}}">{{$employee_data->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row margin-top-20">
                        <label class="col-md-3 control-label">Re-Deadline
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-append  date form_date" data-date-format="yyyy-mm-dd">
                                <input size="30" type="text" required readonly name="reDeadline"
                                    value="{{old('reDeadline',$todo->reDeadline)}}">
                                <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                <span class="add-on"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row  margin-top-20">
                        <label class="control-label col-md-3">Reason for Re-Assign
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <textarea name="reason"
                                    class="form-control textarea @error('reason') is-invalid @enderror" cols="auto"
                                    required rows="10">{{old('reason',$todo->reason)}}</textarea>
                                @error('reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="btn btn-info m-r-20">Submit</button>
                            <a class="btn btn-default" href="{{route('task.index')}}">Cancel</a>
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
