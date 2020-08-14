@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Roles</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Roles</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Roles</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add Roles</header>
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
									<form action="{{route('roles.store')}}" id="form_sample_1" class="form-horizontal" method="post" autocomplete="on">
										{{csrf_field()}}
																			
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Role Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="name" placeholder="enter role name" class="form-control input-height" value="{{old('name','')}}" />
												</div>
											</div>																				
																						
											<div class="form-group row">
												<label class="control-label col-md-3">Role Details
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="description" required placeholder="enter role details"
														class="form-control textarea input-height" rows="5">{{old('description','')}} </textarea>
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" class="btn btn-info m-r-20">Submit</button>
														<a class="btn btn-default" href="{{route('roles.index')}}">Cancel</a>
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