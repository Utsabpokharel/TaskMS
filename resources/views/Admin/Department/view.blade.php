@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">View Departments</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;
                         <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('department.index')}}">Departments</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Department</li>
                </ol>
            </div>
        </div>
    <div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card card-box">
				<div class="card-head">
					<header>All Department</header>
                    <a class="parent-item pull-right btn btn-primary" href="{{ route('department.create') }}">Add +</a>									
				</div>
				<div class="card-body " id="bar-parent">
    				<table id="exportTable" class="display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Main Department</th>
                                <th>Sub Department</th>
								<th>Description</th>
								<th>Actions</th>																									
							</tr>
						</thead>
						<tbody>						
                        @foreach($depart as $dept)
                                    <tr>
                                        <td>{{$dept->id}}</td>
                                        <td>{{$dept->main_dept}}</td>
                                        <td>{{$dept->sub_dept}}</td>
                                        <td>{!! $dept->description !!}</td>
                                        <td class="text-left">

                                            <form action="{{ route('department.edit', $dept->id)}}" method="GET"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <button class="btn btn-primary btn-sm" type="submit"><span
                                                            class="fa fa-pencil"></span></button>
                                            </form>

                                            <form action="{{ route('department.destroy', $dept->id)}}" method="post"
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
    						<tr>
                                <th>#</th>
								<th>Main Department</th>
                                <th>Sub Department</th>
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