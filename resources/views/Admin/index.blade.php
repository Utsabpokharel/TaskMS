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
									<span class="info-box-icon push-bottom"><i class="material-icons">work</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Task <br> Pending</span>
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
										<span class="info-box-text">Task <br> Completed</span>
										<span class="info-box-number">{{$completed}}</span>
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
													<tbody>
														<tr>
															<th>Image</th>
															<th>Employee Name</th>
															<th>Date</th>
															<th>Status</th>
															<th>Ammount</th>
															<th>Transaction ID</th>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std6.jpg" alt="">
															</td>
															<td>John Deo</td>
															<td>05-01-2017</td>
															<td><span class="label label-danger">Unpaid</span></td>
															<td>1200$</td>
															<td>#7234486</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std4.jpg" alt="">
															</td>
															<td>Eugine Turner</td>
															<td>04-01-2017</td>
															<td><span class="label label-success">Paid</span></td>
															<td>1400$</td>
															<td>#7234417</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std2.jpg" alt="">
															</td>
															<td>Jacqueline Howell</td>
															<td>03-01-2017</td>
															<td><span class="label label-warning">Pending</span></td>
															<td>1100$</td>
															<td>#7234454</td>
														</tr>
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
                    {{--<div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i
                                                class="material-icons">monetization_on</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Fees Collection</span>
                                <span class="info-box-number">13,921</span><span>$</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                                <span class="progress-description">
											50% Increase in 28 Days
										</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>--}}
                    <!-- /.col -->
                    </div>
                </div>
        @endif
            <!-- end widget -->

        </div>
    </div>
    <!-- end page content -->

@endsection
