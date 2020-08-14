@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add User</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add User</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add User</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>									
								</div>
								<div class="card-body" id="bar-parent">
									<form action="{{route('user.store')}}" id="form_sample_1" class="form-horizontal" method="post" autocomplete="on"  enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="name" required placeholder="enter User name" 
													class="form-control input-height @error('name') is-invalid @enderror" value="{{old('name','')}}" />
													@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Email
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">													
													<input type="email" name="email" required placeholder="enter User email" 
													class="form-control input-height @error('email') is-invalid @enderror" value="{{old('email','')}}" />
													@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror												
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Password
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="password" name="password" required placeholder="Enter password (Min: 4 - Max: 15)" 
													class="form-control input-height @error('password') is-invalid @enderror" value="{{old('password','')}}" />
													@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
												
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Confirm Password
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="password" name="password_confirmation" required placeholder="Re-enter and Confirm Your password " 
													class="form-control input-height @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation','')}}" />
													@error('password_confirmation')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
												
											</div>																						
																						
											<div class="form-group row">
												<label class="control-label col-md-3">User Role
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height @error('role_id') is-invalid @enderror" name="role_id" >
														<option value="" disabled selected>Select Role</option>
														@foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                   		@endforeach
													</select>
													@error('role_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Position
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="position" required placeholder="enter user position in company" 
													class="form-control input-height @error('position') is-invalid @enderror" value="{{old('position','')}}" />
													@error('position')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Main Department
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height @error('department_id') is-invalid @enderror" name="department_id">
														<option value="" disabled selected>Select Department</option>
														@foreach($depart as $dept)
                                                        <option value="{{$dept->id}}">{{$dept->main_dept}}</option>
                                                   		@endforeach
													</select>
													@error('department_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>
											
											<div class="form-group row">
												<label class="control-label col-md-3">Sub-Department
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height @error('sub_department') is-invalid @enderror" name="sub_department">
														<option value="" disabled selected>Select Sub-Department</option>
														<option value="">None</option>
														@foreach($depart as $dept)
                                                        <option value="{{$dept->id}}">{{$dept->sub_dept}}</option>
                                                   		@endforeach
													</select>
													@error('sub_department')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Joined Dated
													<span class="required"> * </span>
												</label>												
                                            <div class="input-append date form_date col-md-5 @error('joined_date') is-invalid @enderror" data-date-format="yyyy-mm-dd"
                                                data-date="2013-02-21T15:25:00Z">
                                                <input class="@error('joined_date') is-invalid @enderror" size="40" type="text" readonly name="joined_date" value="{{old('joined_date','')}}">
                                                <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                                <span class="add-on"><i class="fa fa-calendar"></i></span>
												@error('joined_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{$message}}</strong>
													</span>
												@enderror
                                            </div>
                                        	</div>
                                        	
											<div class="form-group row">
                                        		<label class="control-label col-md-3">Image
                                           		 	<span class="required"> * </span>
                                       			</label>
                                       			<div class="col-md-5">
													<div class="input-icon right">
														<input type="file" class="form-control bg-light @error('image') is-invalid @enderror" name="image" value="{{old('image','')}}"/>
														@error('image')
															<span class="invalid-feedback" role="alert">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
                                        		</div>
                                    		</div>
											
											<div class="form-group row">
                                        		<label class="control-label col-md-3">Gender
                                            		<span class="required"> * </span>
                                        		</label>
                                       		<div class="col-md-5">
											<div class="row">
                                            	<div class="card-body" id="bar-parent3">                                               
                                                    <div class="radio">
                                                        <input id="radiobg1" name="gender" type="radio" checked="checked" value="Male">
                                                        <label for="radiobg1">Male</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input id="radiobg2" name="gender" type="radio" value="Female">
                                                        <label for="radiobg2">Female</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input id="radiobg3" name="gender" type="radio" value="Other">
														<label for="radiobg3">Others</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   	</div>                                               
										<div class="form-actions">
											<div class="row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20">Submit</button>
													 <a class="btn btn-default" href="{{route('user.index')}}">Cancel</a>
												</div>
											</div>
										</div>									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection			