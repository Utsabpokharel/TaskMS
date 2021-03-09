@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">View Leave Type</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('leaveType.index')}}">Leave Type</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Leave Type</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Leave Type</header>
                        <a class="parent-item pull-right btn btn-primary" href="{{ route('leaveType.create') }}">Add
                            +</a>
                    </div>
                    <div class="card-body " id="bar-parent">
                        <table id="exportTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Leave Type</th>
                                    <th>Allocated Days</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($type as $types)
                                <tr class="text-center">
                                    <td>{{$types->id}}</td>
                                    <td>{{$types->leavetype}}</td>
                                    <td>{{$types->leavedays}}</td>
                                    <td>{{$types->description}}</td>
                                    <td class="text-center">

                                        <form action="{{ route('leaveType.edit', $types->id)}}" method="GET"
                                            style="display: inline-block">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button class="btn btn-primary btn-sm" type="submit"><span
                                                    class="fa fa-pencil"></span></button>
                                        </form>

                                        <form action="{{ route('leaveType.destroy', $types->id)}}" method="post"
                                            style="display: inline-block">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="fa fa-trash-o"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Leave Type</th>
                                    <th>Allocated Days</th>
                                    <th>Description</th>
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
