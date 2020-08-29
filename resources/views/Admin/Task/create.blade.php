@extends('Admin.Layouts.master')
@section('main_content')
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Tasks</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('task.index')}}">Tasks</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Tasks</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Add Tasks</header>
							<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
							</button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('task.store')}}" method="post" id="form_sample_2" class="form-horizontal" 
							enctype="multipart/form-data" autocomplete="on"> 
							{{csrf_field()}} 
                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Title
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" required name="title" value="{{old('title','')}}"/>
                                                    @error('title')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror	
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="description" class="form-control textarea @error('description') is-invalid @enderror" required rows="10">{{old('description','')}}</textarea>
                                                @error('description')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
												@enderror	
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Assigned TO
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right ">
                                                <i class="fa"></i>
                                                <select class="form-control input-height" required name="assignedTo">
                                                    <option value="" disabled selected>--Select Staffs--</option>
                                                    @foreach($employee as $employ)
                                                    <option value="{{$employ->id}}">{{$employ->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div>
                                    <div class="form-group row margin-top-20">
                                        <label class="col-md-3 control-label">Deadline
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-append date form_date @error('deadline') is-invalid @enderror" data-date-format="yyyy-mm-dd">
                                                <input class="@error('deadline') is-invalid @enderror" size="65" type="text" required readonly name="deadline" value="{{old('deadline','')}}">
                                                <span class="add-on @error('deadline') is-invalid @enderror"><i class="fa fa-remove icon-remove"></i></span>
                                                <span class="add-on @error('deadline') is-invalid @enderror"><i class="fa fa-calendar"></i></span>
                                                @error('deadline')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
												@enderror	
                                            </div>
                                        </div>
                                    </div>

									<div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Task Priority
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right ">
                                                <i class="fa"></i>
                                                <select class="form-control input-height" required name="task_priority">
                                                    <option value="" disabled selected>--Select Priority--</option>
                                                    <option value="High" {{old('task_priority')=='High'?'selected':''}}>High</option>
													<option value="Low" {{old('task_priority')=='Low'?'selected':''}}>Low</option>
													<option value="Medium" {{old('task_priority')=='Medium'?'selected':''}}>Medium</option>
													<option value="Urgent" {{old('task_priority')=='Urgent'?'selected':''}}>Urgent</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

									<div class="form-group row margin-top-20">
                                        	<label class="control-label col-md-3">Attached File
                                           		<span class="required">  </span>
                                       		</label>
                                       		<div class="col-md-8">
                                            	<div class="input-icon right">
                                                	<input type="file" class="form-control bg-light @error('fileUpload') is-invalid @enderror" name="fileUpload" value="{{old('fileUpload','')}}"/>
                                                    @error('fileUpload')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror	
                                                </div>
                                        		</div>
                                    		</div>
									</div>

                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Remarks
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="remarks" class="form-control textarea @error('remarks') is-invalid @enderror" cols="auto"
                                                required rows="10">{{old('remarks','')}}</textarea>
                                                @error('remarks')
														<span class="invalid-feedback" role="alert">
															<strong>{{$message}}</strong>
														</span>
													@enderror	
                                            </div>
                                        </div>
                                    </div>
                                    {{--User Id--}}
                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}"
                                           required readonly name="user_id"/>
                                    {{--End--}}
                                    {{--Completed Date--}}
                                    <input size="60" type="hidden" readonly name="completedDate">
                                    {{--End--}}
                                    {{--Assigned date--}}
                                    <input type="hidden" class="form-control" value="{{$d}}"
                                           required readonly name="assignedDate"/>
                                    {{-- End--}}
                                    {{--Assigned by--}}
                                    <input type="hidden" class="form-control" value="{{Auth::user()->name}}"
                                           required readonly name="assignedBy"/></div>
                                    {{--End--}}
                                    
                                    {{--Status--}}
                                    <div>
                                        <input type="hidden" class="form-control" value="0"
                                               required readonly name="status"/>
                                    </div>
                                    {{--End--}}
                                    <div class="form-group">
                                        <div class="offset-md-3 col-md-9">
                                            <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                            <a class="btn btn-default" href="{{route('task.index')}}">Cancel</a>
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