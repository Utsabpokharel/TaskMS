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
				</div>
				<div class="card-body " id="bar-parent">
    				<table id="exportTable" class="display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
                                <!-- <th>Assigned To</th> -->
                                <th>Priority Level</th>
								<th>Assigned By</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                
                                       
                                   
                                																									
							</tr>
						</thead>
						<tbody>	
                        @if(isset($todo))
                            @foreach($todo as $tsk)
                                    <tr>
                                        <td>{{$tsk->id}}</td>
                                        @if(Auth::user()->id==2)
                                        <td><a class="parent-item" href="{{route('TaskDetails',[$tsk->id])}}"> {{$tsk->title}} </a></td>
                                        @else
                                            <td><a class="parent-item" href="{{route('EmployeeDetails',[$tsk->id])}}"> {{$tsk->title}} </a></td>
                                        @endif
                                        <td>{{$tsk->task_priority}}</td> 
                                        @if($tsk->reAssignedTo == Auth::user()->id)
                                        <td>{{$tsk->ReAssignedBy}}</td>
                                        @else
                                        <td>{{$tsk->superadmin['name']}}</td>
                                        @endif
                                        <td>{{$tsk->employee['name']}}</td>
                                        <td class="valigntop">
                                            <div class="btn-group">
                                                    @if($tsk->status==1)
                                                        Completed
                                                    @else
                                                    <button class="btn btn-xs  dropdown-toggle no-margin" type="button" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                    @if($tsk->status==0)
                                                        Pending
                                                    
                                                    @endif
                                                    </button> 
                                                    <i class="fa fa-angle-down"></i>  
                                                    <ul class="dropdown-menu pull-left" role="menu"> 
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
                                    </tr>
                            @endforeach  
                        @endif                            																										
						</tbody>
						<tfoot>
    						<tr>
                                <th>#</th>
								<th>Title</th>
                                <th>Priority Level</th>
								<th>Assigned By</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                               
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