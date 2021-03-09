@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">View Leaves</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('leave.index')}}">Leaves</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Leaves</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Leaves</header>
                        <a class="parent-item pull-right btn btn-primary" href="{{ route('leave.create') }}">Add
                            +</a>
                    </div>
                    <div class="card-body " id="bar-parent">
                        <table id="exportTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Leave Type</th>
                                    <th>Leave Reason</th>
                                    <th>Applied On</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leave as $leave)
                                <tr class="text-center">
                                    <td>{{$leave->id}}</td>
                                    <td><a href="{{ route('leave.show',[$leave->id])}}">{{$leave->leave_type}}</a>
                                    </td>
                                    <td>{{$leave->leave_reason}}</td>
                                    <td>{{$leave->applied_on}}</td>
                                    <td class="valigntop">
                                        <div class="btn-group">
                                            @if($leave->status=='1')
                                            <i class="btn-success"> Approved</i>
                                            @elseif($leave->status=='0')
                                            <i class="btn-danger">Not-Approved</i>
                                            @else
                                            <i class="btn-warning">Pending</i>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($leave->from <= $d || $leave->status=='1' || $leave->status == '0')
                                            <a href="{{ route('leave.show',[$leave->id])}}">
                                                <button class="btn btn-success btn-sm" type="submit"><span
                                                        class="fa fa-eye"></span></button></a>
                                            @else
                                            <form action="{{ route('leave.edit', $leave->id)}}" method="GET"
                                                style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <button class="btn btn-primary btn-sm" type="submit"><span
                                                        class="fa fa-pencil"></span></button>
                                            </form>

                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Applied By</th>
                                    <th>Leave Type</th>
                                    <th>Applied On</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
