@section('main_content')
<!-- start page content -->
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Students</span>
										<span class="info-box-number">450</span>
										<div class="progress">
											<div class="progress-bar" style="width: 45%"></div>
										</div>
										<span class="progress-description">
											45% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
									<div class="info-box-content">
										<span class="info-box-text">New Students</span>
										<span class="info-box-number">155</span>
										<div class="progress">
											<div class="progress-bar" style="width: 40%"></div>
										</div>
										<span class="progress-description">
											40% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Course</span>
										<span class="info-box-number">52</span>
										<div class="progress">
											<div class="progress-bar" style="width: 85%"></div>
										</div>
										<span class="progress-description">
											85% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
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
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- end widget -->
					<!-- chart start -->
					
					<!-- Chart end -->
					<!-- start course list -->
					
					<!-- End course list -->
					<!-- <div class="row"> -->
						<!-- Quick Mail start -->
						
						<!-- Quick Mail end -->
						<!-- Activity feed start -->
						
						<!-- Activity feed end -->
					<!-- </div> -->
					
					<!-- start new student list -->
					
					<!-- end new student list -->

					<!-- task status -->	
										
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
									<!-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->
								</div>
								<div class="card-body " id="bar-parent">
									<table id="exportTable" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Task</th>
												<th>Assigned to</th>
												<th>Deadline</th>	
												<th>Status</th>																	
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td>1</td>
												<td>Regional Director</td>
												<td>London</td>
												<td>19</td>
												<td>
													<span class="label label-sm label-success">Done</span>
												</td>
												
											</tr>
											
											<tr>
												<td>2</td>
												<td>Sales Assistant</td>
												<td>New York</td>
												<td>46</td>
												<td>
													<span class="label label-sm label-danger">Suspended</span>
												</td>
												
											</tr>
											<tr>
												<td>3</td>
												<td>Sales Assistant</td>
												<td>New York</td>
												<td>46</td>
												<td>
													<span class="label label-sm label-warning"> Pending </span>
												</td>
												
											</tr>
											
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Task</th>
												<th>Assigned to</th>
												<th>Deadline</th>	
												<th>Status</th>	
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>

					<!-- salary -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Salary Status</header>
								</div>
								<div class="card-body ">
									<div class="mdl-tabs mdl-js-tabs">
										<div class="mdl-tabs__tab-bar tab-left-side">
											<a href="#tab4-panel"
												class="mdl-tabs__tab tabs_three is-active">Front End</a>
											<a href="#tab5-panel" class="mdl-tabs__tab tabs_three">Back End</a>
											<a href="#tab6-panel" class="mdl-tabs__tab tabs_three">Others</a>
										</div>
										<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<th>Image</th>
															<th>Name</th>
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
											<div class="text-center">
												<button class="btn btn-outline-primary btn-round btn-sm">Load
													More</button>
											</div>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab5-panel">
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<th>Image</th>
															<th>Name</th>
															<th>Date</th>
															<th>Status</th>
															<th>Ammount</th>
															<th>Transaction ID</th>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std1.jpg" alt="">
															</td>
															<td>Eugine Turner</td>
															<td>04-01-2017</td>
															<td><span class="label label-success">Paid</span></td>
															<td>700$</td>
															<td>#7234417</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std4.jpg" alt="">
															</td>
															<td>Jacqueline Howell</td>
															<td>03-01-2017</td>
															<td><span class="label label-warning">Pending</span></td>
															<td>500$</td>
															<td>#7234454</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std5.jpg" alt="">
															</td>
															<td>Jayesh Parmar</td>
															<td>03-01-2017</td>
															<td><span class="label label-danger">Unpaid</span></td>
															<td>400$</td>
															<td>#72544</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="text-center">
												<button class="btn btn-outline-primary btn-round btn-sm">Load
													More</button>
											</div>
										</div>
										<div class="mdl-tabs__panel p-t-20" id="tab6-panel">
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<th>Image</th>
															<th>Name</th>
															<th>Date</th>
															<th>Status</th>
															<th>Ammount</th>
															<th>Transaction ID</th>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std8.jpg" alt="">
															</td>
															<td>Jane Elliott</td>
															<td>06-01-2017</td>
															<td><span class="label label-primary">Paid</span></td>
															<td>300$</td>
															<td>#7234421</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std7.jpg" alt="">
															</td>
															<td>Jacqueline Howell</td>
															<td>03-01-2017</td>
															<td><span class="label label-warning">Pending</span></td>
															<td>450$</td>
															<td>#723344</td>
														</tr>
														<tr>
															<td class="patient-img sorting_1">
																<img src="../assets/img/std/std9.jpg" alt="">
															</td>
															<td>Jacqueline Howell</td>
															<td>03-01-2017</td>
															<td><span class="label label-primary">Paid</span></td>
															<td>550$</td>
															<td>#7235454</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="text-center">
												<button class="btn btn-outline-primary btn-round btn-sm">Load
													More</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			<div class="chat-sidebar-container" data-close-on-body-click="false">
				<div class="chat-sidebar">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="index.html#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab"> <i
									class="material-icons">chat</i>Chat
								<span class="badge badge-danger">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="index.html#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> <i
									class="material-icons">settings</i>
								Settings
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<!-- Start Doctor Chat -->
						<div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel"
							id="quick_sidebar_tab_1">
							<div class="chat-sidebar-list">
								<div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
									data-wrapper-class="chat-sidebar-list">
									<div class="chat-header">
										<h5 class="list-heading">Online</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media"><img class="media-object" src="../assets/img/prof/prof3.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">John Deo</h5>
												<div class="media-heading-sub">Spine Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">5</span>
											</div> <img class="media-object" src="../assets/img/prof/prof1.jpg"
												width="35" height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Rajesh</h5>
												<div class="media-heading-sub">Director</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="../assets/img/prof/prof5.jpg"
												width="35" height="35" alt="...">
											<i class="away dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jacob Ryan</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-danger">8</span>
											</div> <img class="media-object" src="../assets/img/prof/prof4.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Kehn Anderson</h5>
												<div class="media-heading-sub">CEO</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="../assets/img/prof/prof2.jpg"
												width="35" height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Sarah Smith</h5>
												<div class="media-heading-sub">Anaesthetics</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="../assets/img/prof/prof7.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Vlad Cardella</h5>
												<div class="media-heading-sub">Cardiologist</div>
											</div>
										</li>
									</ul>
									<div class="chat-header">
										<h5 class="list-heading">Offline</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media">
											<div class="media-status">
												<span class="badge badge-warning">4</span>
											</div> <img class="media-object" src="../assets/img/prof/prof6.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jennifer Maklen</h5>
												<div class="media-heading-sub">Nurse</div>
												<div class="media-heading-small">Last seen 01:20 AM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="../assets/img/prof/prof8.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Lina Smith</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
												<div class="media-heading-small">Last seen 11:14 PM</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">9</span>
											</div> <img class="media-object" src="../assets/img/prof/prof9.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jeff Adam</h5>
												<div class="media-heading-sub">Compounder</div>
												<div class="media-heading-small">Last seen 3:31 PM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="../assets/img/prof/prof10.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Anjelina Cardella</h5>
												<div class="media-heading-sub">Physiotherapist</div>
												<div class="media-heading-small">Last seen 7:45 PM</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Doctor Chat -->
						<!-- Start Setting Panel -->
						<div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
							<div class="chat-sidebar-settings-list slimscroll-style">
								<div class="chat-header">
									<h5 class="list-heading">Layout Settings</h5>
								</div>
								<div class="chatpane inner-content ">
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Sidebar Position</div>
											<div class="setting-set">
												<select
													class="sidebar-pos-option form-control input-inline input-sm input-small ">
													<option value="left" selected="selected">Left</option>
													<option value="right">Right</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Header</div>
											<div class="setting-set">
												<select
													class="page-header-option form-control input-inline input-sm input-small ">
													<option value="fixed" selected="selected">Fixed</option>
													<option value="default">Default</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Footer</div>
											<div class="setting-set">
												<select
													class="page-footer-option form-control input-inline input-sm input-small ">
													<option value="fixed">Fixed</option>
													<option value="default" selected="selected">Default</option>
												</select>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">Account Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Notifications</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-1">
														<input type="checkbox" id="switch-1" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Show Online</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-7">
														<input type="checkbox" id="switch-7" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Status</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-2">
														<input type="checkbox" id="switch-2" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">2 Steps Verification</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-3">
														<input type="checkbox" id="switch-3" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">General Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Location</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-4">
														<input type="checkbox" id="switch-4" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Save Histry</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-5">
														<input type="checkbox" id="switch-5" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Auto Updates</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-6">
														<input type="checkbox" id="switch-6" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
@endsection