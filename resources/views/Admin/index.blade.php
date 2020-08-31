@extends('Admin.Layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <!--  -->
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            @if(Auth::user()->role_id==1)
            <!-- start widget -->
			<h2 class="card-head">SuperAdmin Dashboard</h2>
            <div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total <br>Admin</span>
										<span class="info-box-number">{{$admins}}</span>										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total <br> Employee</span>
										<span class="info-box-number">{{$employee}}</span>										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total <br> Users</span>
										<span class="info-box-number">{{$users}}</span>										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">work</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Tasks<br>Assigned</span>
										<span class="info-box-number">{{$task}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
					</div>

                    <div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Task Status</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>									
								</div>
								<div class="card-body " id="bar-parent">
									<table id="exportTable" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Task</th>
												<th>Assigned to</th>
												<th>Priority Level</th>
												<th>Deadline</th>	
												<th>Status</th>																	
											</tr>
										</thead>
										<tbody>
										@if(isset($todo))
										@foreach($todo as $task)	
											<tr>
												<td>{{$task->id}}</td>
												<td> <a class="parent-item" href="{{route('task.show',[$task->id])}}"> {{$task->title}} </a> </td>
												<td>{{$task->employee['name']}}</td>
												<td>{{$task->task_priority}}</td>
												<td>{{$task->deadline}}</td>
												@if($task->status==0)
												<td>
													<span class="label label-sm label-warning">Pending</span>
												</td>
												@elseif($task->status==1)
												<td><span class="label label-sm label-success">Completed</span></td>
												@else
												<td><span class="label label-sm label-success">Re-Assigned</span></td>
												@endif
											</tr>
										@endforeach	
										@endif
						
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Task</th>
												<th>Assigned to</th>
												<th>Priority Level</th>
												<th>Deadline</th>	
												<th>Status</th>	
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>

                    <div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Salary Status</header>
								</div>
								<div class="card-body ">
									<div class="mdl-tabs mdl-js-tabs">										
										<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											<div class="table-responsive">
												<table class="table" id="exportTable">
													<thead>
													<th>Image</th>
															<th>Employee Name</th>
															<th>Joined Date</th>
															<th>Salary Status</th>
															<th>Basic Salary</th>
															<th>Unpaid Amount</th>
													</thead>
													<tbody>
													@foreach($allUsers as $usr)
														<tr>
														@if($usr->image)
															<td>
																<img src="{{asset('Uploads/UserImage/'.$usr->image)}}" alt="User image" width="85" height="75">
															</td>
														@else
															<td>No image available</td>
														@endif      
															<td>{{$usr->name}}</td>
															<td>{{$usr->joined_date}}</td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													@endforeach	
													</tbody>
												</table>
											</div>											
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
            @endif

        @if(Auth::user()->role_id==3)
            <!-- start widget -->
			<h2 class="card-head">Employee Dashboard</h2> 
                <div class="state-overview">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="info-box bg-b-yellow">
                                <span class="info-box-icon push-bottom"><i class="material-icons">work</i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pending <br> Tasks</span>                                 
                                    <span class="info-box-number">{{$pending}}</span>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="info-box bg-b-green">
                                <span class="info-box-icon push-bottom"><i class="material-icons">work</i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Completed <br> Tasks</span>                                  
                                    <span class="info-box-number">{{$completed}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="info-box bg-b-blue">
                                <span class="info-box-icon push-bottom"><i class="material-icons">work</i></span>
                                <div class="info-box-content">                                
                                    <span class="info-box-text">Total <br> Tasks</span>                                   
                                    <span class="info-box-number">{{$all}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    
                    <!-- /.col -->
                    </div>
                </div>
        @endif
            <!-- end widget -->
			@if(Auth::user()->role_id==2)
				<h2 class="card-head">Admin Dashboard</h2> 
                	<div class="state-overview">
                    	<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Task <br> Received</span>
										<span class="info-box-number">{{$received}}</span>										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">work</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Tasks<br>Pending</span>
										<span class="info-box-number">{{$pending}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->

							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">work</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Tasks<br>Completed</span>
										<span class="info-box-number">{{$completed}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-blue">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">work</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Tasks<br>Assigned</span>
										<span class="info-box-number">{{$admin_task}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
						</div>
					</div>			
				@endif	

        </div>
    </div>
    <!-- end page content -->

@endsection
