@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">View Tasks</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;
                         <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('task.index')}}">Tasks</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Tasks</li>
                </ol>
            </div>
        </div>
    <div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card card-box">
				<div class="card-head">
					<header>All Tasks</header>
                    <a class="parent-item pull-right btn btn-primary" href="{{ route('task.create')}}">Add +</a>									
				</div>
				<div class="card-body " id="bar-parent">
    				<table id="exportTable" class="display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
                                <th>Assigned To</th>
                                <th>Priority Level</th>
								<th>assignedBy</th>
                                <th>Deadline</th>
                                <th>Status</th>
								<th>Actions</th> 
                                <th>Re-Assigned To</th>
                                       
                                   
                                																									
							</tr>
						</thead>
						<tbody>	
                        @if(isset($tasks))
                            @foreach($tasks as $tsk)
                                    <tr>
                                        <td>{{$tsk->id}}</td>
                                        <td><a class="parent-item" href="{{route('task.show',[$tsk->id])}}"> {{$tsk->title}} </a></td>                                        
                                        <td>{{$tsk->employee['name']}}</td>                                        
                                        <td>{{$tsk->task_priority}}</td> 
                                        <td>{{$tsk->superadmin['name']}}</td>
                                        <td>{{$tsk->deadline}}</td>
                                        <td class="valigntop">
                                            <div class="btn-group">
                                            @if($tsk->status==1)
                                                Completed
                                            @else
                                                <button class="btn btn-xs  dropdown-toggle no-margin"
                                                        type="button" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                    @if($tsk->status==0)
                                                        Pending
                                                    @endif
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">                                                   
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('pending',$tsk->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn "
                                                                        type="submit"><span
                                                                            class=""></span> Pending
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('complete',$tsk->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn " type="submit">
                                                                    <span class=""></span> Completed
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('reaassign',$tsk->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn " type="submit">
                                                                    <span class=""></span> Re-assign
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                @endif
                                                    
                                                </ul>
                                            </div>
                                        </td> 
                                        <!-- @if($tsk->status==0)
                                        <td>Pending</td>
                                        @elseif($tsk->status==1)
                                        <td>Completed</td>
                                        @else
                                        <td>Re-Assigned</td>
                                        @endif -->
                                        @if($tsk->status==1)
                                        <td class="text-left">
                                        <a href="{{route('task.show',[$tsk->id])}}" class="btn-success btn-sm btn-circle blue" type="submit">View <span
                                                                class="fa fa-eye"></span></a>
                                        </td>
                                        @else
                                            <td class="text-left">

                                                <form action="{{ route('task.edit', $tsk->id)}}" method="GET"
                                                    style="display: inline-block">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                                                class="fa fa-pencil"></span></button>
                                                </form>
                                                
                                                <form action="{{ route('task.destroy', $tsk->id)}}" method="post"
                                                    style="display: inline-block">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger btn-sm" type="submit"><span
                                                                class="fa fa-trash-o"></span></button>
                                                </form>
                                            </td>
                                        @endif
                                        @if($tsk->reAssignedTo)
                                                <td>{{@$tsk->reassignto['name']}}</td>
                                        @else
                                            <td>None</td>                                                                                                                                             
                                        @endif
                                    </tr>
                            @endforeach  
                        @endif                            																										
						</tbody>
						<tfoot>
    						<tr>
                                <th>#</th>
								<th>Title</th>
                                <th>Assigned To</th>
                                <th>Priority Level</th>
								<th>assignedBy</th>
                                <th>Deadline</th>
                                <th>Status</th>
								<th>Actions</th>
                                <th>Re-Assigned To</th>
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