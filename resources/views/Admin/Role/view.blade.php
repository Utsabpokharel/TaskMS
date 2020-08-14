@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">View Roles</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;
                         <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('roles.index')}}">Roles</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Roles</li>
                </ol>
            </div>
        </div>
    <div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card card-box">
				<div class="card-head">
					<header>All Roles</header>
                    <!-- <a class="parent-item pull-right btn btn-primary" href="{{ route('roles.create') }}">Add +</a>									 -->
				</div>
				<div class="card-body " id="bar-parent">
    				<table id="exportTable" class="display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Role Name</th>
								<th>Description</th>
								<th>Actions</th>																									
							</tr>
						</thead>
						<tbody>						
                        @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{!! $role->description !!}</td>
                                        <td class="text-left">
                                        <a class="btn-success btn-sm" href="#"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <!-- <form action="{{ route('roles.edit', $role->id)}}" method="GET"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <button class="btn btn-primary btn-sm" type="submit"><span
                                                            class="fa fa-pencil"></span></button>
                                            </form>

                                            <form action="{{ route('roles.destroy', $role->id)}}" method="post"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btn-sm" type="submit"><span
                                                            class="fa fa-trash-o"></span></button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach																											
						</tbody>
						<tfoot>
    						<tr>
                                <th>#</th>
								<th>Role Name</th>
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