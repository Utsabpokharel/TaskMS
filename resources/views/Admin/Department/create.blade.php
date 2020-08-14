@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Department</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="{{route('department.index')}}">Departments</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Department</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add Department</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body" id="bar-parent">
									<form action="{{route('department.store')}}" id="form_sample_1" class="form-horizontal" method="post" autocomplete="on">
										{{csrf_field()}}
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Main Department
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="main_dept" required placeholder="enter main department" 
													class="form-control input-height @error('main_dept') is-invalid @enderror" value="{{old('main_dept','')}}" />
													@error('main_dept')
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
													<input type="text" name="sub_dept" required placeholder="Sub-department(if any) else enter None" 
													class="form-control input-height @error('sub_dept') is-invalid @enderror" value="{{old('sub_dept','')}}" />
													@error('sub_dept')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror
												</div>
											</div>																						
																						
											<div class="form-group row">
												<label class="control-label col-md-3">Department Details
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="description" required placeholder="enter department details"
														class="form-control textarea input-height @error('description') is-invalid @enderror" rows="5">{{old('description','')}}</textarea>
														@error('description')
															<span class="invalid-feedback" role="alert">
																<strong>{{$message}}</strong>
															</span>
														@enderror
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" class="btn btn-info m-r-20">Submit</button>
														<a class="btn btn-default" href="{{route('department.index')}}">Cancel</a>
													</div>
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