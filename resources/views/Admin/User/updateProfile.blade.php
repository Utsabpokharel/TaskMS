@extends('Admin.Layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Update Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Dashboard</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>

                        <li class="active">Update Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Education
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Personal
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#work" data-toggle="tab">Work
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="card-body" id="bar-parent2">
                                    @if($educ == [])
                                            <form action="{{route('education.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post" autocomplete="on">
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Institution Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                          
                                                            <input type="text" class="form-control" name="inst_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Institution address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="inst_address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Faculty
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="faculty" />
                                                        </div>
                                                        <span>(eg . Science, management, etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Board
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="board" />
                                                        </div>
                                                        <span>(eg . NEB, Government of nepal , etc.)</span>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Degree
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="degree" />
                                                        </div>
                                                        <span>(eg . Masters, Bachelors , etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Division Obtained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="division" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Passed Year
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <div class="input-height date form_date"
                                                                 data-date-format="yyyy/mm/dd" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="passed_year" aria-required="true">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                         </form>
                                    
                                    
                                    
                                    @endif                                     
                                    @if($educ != null)
                                        <form action="{{route('education.update',$educ->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post" autocomplete="on"
                                        >
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Institution Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                          
                                                            <input type="text" class="form-control" name="inst_name" value="{{$educ->inst_name}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Institution address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="inst_address" value="{{$educ->inst_address}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Faculty
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="faculty" value="{{$educ->faculty}}"/>
                                                        </div>
                                                        <span>(eg . Science, management, etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Board
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="board" value="{{$educ->board}}"/>
                                                        </div>
                                                        <span>(eg . NEB, Government of nepal , etc.)</span>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Degree
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="degree" value="{{$educ->degree}}"/>
                                                        </div>
                                                        <span>(eg . Masters, Bachelors , etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Division Obtained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="division" value="{{$educ->division}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Passed Year
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <div class="input-height date form_date"
                                                                 data-date-format="yyyy/mm/dd" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="passed_year" aria-required="true" value="{{$educ->passed_year}}">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                
                                    
                                    @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="card-body" id="bar-parent2">
                                        @if($prsnl == [])
                                        <form action="{{route('personal.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">About Me
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="about" class="form-control textarea" required rows="10">{{old('about','')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address1"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Permanent Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address2"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Contact No.1
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone1"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Contact No. 2
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone2"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Date of Birth
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <div class="input-height date form_date"
                                                                 data-date-format="yyyy-mm-dd" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="dob" aria-required="true">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Citizenship Front
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="file" class="form-control" name="ctzn_f"/>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Citizenship Back
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="file" class="form-control" name="ctzn_b"/>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>

                                            
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                        @if($prsnl != null)
                                        <form action="{{route('personal.update',$prsnl->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <!-- <input type="hidden" name="service_id" value="0"> -->
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">                                           
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">About Me
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="about" class="form-control textarea" required rows="10">{{old('about',$prsnl->about)}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>                                                 
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address1" value="{{$prsnl->address1}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Permanent Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address2" value="{{$prsnl->address2}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Contact No. 1
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone1" value="{{$prsnl->phone1}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Contact No. 2
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone2" value="{{$prsnl->phone2}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Date of Birth
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <div class="input-append date form_date"
                                                                 data-date-format="yy-m-d H:i:s" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="dob" aria-required="true" value="{{$prsnl->dob}}">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>                                               
                                               
                                            </div>

                                            
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="work">
                                    <div class="card-body" id="bar-parent2">
                                        @if($wrk == [])
                                        <form action="{{route('work.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Work Experience
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="experience" class="form-control textarea" required rows="10">{{old('experience','')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Skills Gained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="skills" class="form-control textarea" required rows="10">{{old('skills','')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Projects Completed
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="projects" class="form-control textarea" required rows="10">{{old('projects','')}}</textarea>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                        @if($wrk !=null)
                                        <form action="{{route('work.update',$wrk->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <!-- <input type="hidden" name="service_id" value="0"> -->
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Work Experience
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="experience" class="form-control textarea" required rows="10">{{old('experience',$wrk->experience)}}</textarea>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Skills Gained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="skills" class="form-control textarea" required rows="10">{{old('skills',$wrk->skills)}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Projects Completed
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea name="projects" class="form-control textarea" required rows="10">{{old('projects',$wrk->projects)}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="card-body" id="bar-parent2">
                                        <form action="{{route('update_profile',Auth::user()->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              autocomplete="on" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="old_password"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">New Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="password"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Confirm Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="password_confirmation"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>



                                            </div>

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <a class="btn btn-default" href="{{route('user_profile')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div>
    <!-- end page container -->


    ​

@endsection