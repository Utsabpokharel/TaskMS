@section('sidebar')
<!-- start page container -->
<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="pull-left image">
									<a href="{{route('user_profile')}}">
										<img class="img-circle " src="{{asset('Uploads/UserImage/'.Auth::user()->image)}}" alt="img"/>
									</a>
									</div>
									<div class="pull-left info">
										<p> {{Auth::user()->name}}</p>
										<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
												Online</span></a>
									</div>
								</div>
							</li>
							<li class="nav-item start active open">
								<a href="{{route('admin-dashboard')}}" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
									<span class="selected"></span>									
								</a>								
							</li>
						@if(Auth::user()->role_id==1)
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">event</i>
									<span class="title">Event Management</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('roles.index')}}" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Roles</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('roles.index')}}" class="nav-link "> <span class="title">All
												Roles</span>
										</a>
									</li>
									<!-- <li class="nav-item">
										<a href="{{route('roles.create')}}" class="nav-link "> <span class="title">Add
												Roles</span>
										</a>
									</li>									 -->
								</ul>
							</li>
							<li class="nav-item">
								<a href="{{route('department.index')}}" class="nav-link nav-toggle"> <i class="material-icons">business</i>
									<span class="title">Departments</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('department.index')}}" class="nav-link "> <span class="title">All
												Departments</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('department.create')}}" class="nav-link "> <span class="title">Add
												Department</span>
										</a>
									</li>									
								</ul>
							</li>
							
							<li class="nav-item">
								<a href="{{route('user.index')}}" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Users</span> <span class="arrow"></span>
									<span class="label label-rouded label-menu label-success">new</span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('user.index')}}" class="nav-link "> <span class="title">All
												Users</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('user.create')}}" class="nav-link "> <span class="title">Add
												Users</span>
										</a>
									</li>									
								</ul>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"><i class="material-icons">book</i>
									<span class="title">Tasks</span><span class="arrow"></span></a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('task.index')}}" class="nav-link "> <span class="title">All
												Tasks</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('task.create')}}" class="nav-link "> <span class="title">Add
												Tasks</span>
										</a>
									</li>									
								</ul>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Reports</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">All Reports</span></a>
									</li>
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">Add Reports</span></a>
									</li>									
								</ul>
							</li>
							<li class="nav-item">
								<a href="index.html#" class="nav-link nav-toggle"> <i class="material-icons">monetization_on</i>
									<span class="title">Salary</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">Salary Details</span></a>
									</li>
									<li class="nav-item">
										<a href="add_fees.html" class="nav-link "> <span class="title">Add Salary </span></a>
									</li>									
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">Salary Receipt</span></a>
									</li>
						
								</ul>
							</li>
						@endif	
						@if(Auth::user()->role_id==2)
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"><i class="material-icons">book</i>
									<span class="title">Tasks</span><span class="arrow"></span></a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('assignTask')}}" class="nav-link "> <span class="title">Task
												Assigned</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('adminTask')}}" class="nav-link "> <span class="title">Task
												Received</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('task.create')}}" class="nav-link "> <span class="title">Add
												Tasks</span>
										</a>
									</li>									
								</ul>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Reports</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">All Reports</span></a>
									</li>
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">Add Reports</span></a>
									</li>									
								</ul>
							</li>
						@endif	
						@if(Auth::user()->role_id==3)
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"><i class="material-icons">book</i>
									<span class="title">Tasks</span><span class="arrow"></span></a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="{{route('Employee')}}" class="nav-link "> <span class="title">All
												Tasks</span>
										</a>
									</li>				
								</ul>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Reports</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">All Reports</span></a>
									</li>
									<li class="nav-item">
										<a href="" class="nav-link "> <span class="title">Add Reports</span></a>
									</li>									
								</ul>
							</li>
						@endif					
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
@endsection