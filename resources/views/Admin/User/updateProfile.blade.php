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
                                                          
                                                            <input type="text" class="form-control @error('inst_name') is-invalid @enderror" name="inst_name" value="{{old('inst_name','')}}" />
                                                            @error('inst_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
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
                                                            <input type="text" class="form-control @error('inst_address') is-invalid @enderror" name="inst_address" value="{{old('inst_address','')}}"/>
                                                                   @error('inst_address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                    @enderror
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
                                                            <input type="text" class="form-control @error('faculty') is-invalid @enderror"
                                                                   name="faculty" value="{{old('faculty','')}}"/>
                                                                    @error('faculty')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                    @enderror
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
                                                            <input type="text" class="form-control @error('board') is-invalid @enderror"
                                                                   name="board" value="{{old('board','')}}"/>
                                                                    @error('board')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                    @enderror
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
                                                            <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                                                   name="degree" value="{{old('degree','')}}"/>
                                                                    @error('degree')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                    @enderror
                                                        </div>
                                                        <span>(eg . Masters, Bachelors , etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Division/CGPA/GPA
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control @error('division') is-invalid @enderror"
                                                                   name="division" value="{{old('division','')}}"/>
                                                                   @error('division')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                   @enderror
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
                                                                <input class= "@error('passed_year') is-invalid @enderror" size="30" type="text" required readonly name="passed_year" value="{{old('passed_year','')}}" aria-required="true">
                                                                       @error('passed_year')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{$message}}</strong>
                                                                            </span>
                                                                        @enderror
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
                                                          
                                                            <input type="text" class="form-control @error('inst_name') is-invalid @enderror" name="inst_name" value="{{$educ->inst_name}}"/>
                                                            @error('inst_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
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
                                                            <input type="text" class="form-control @error('inst_address ') is-invalid @enderror"
                                                                   name="inst_address" value="{{$educ->inst_address}}"/>
                                                            @error('inst_address ')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
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
                                                            <input type="text" class="form-control @error('faculty') is-invalid @enderror"
                                                                   name="faculty" value="{{$educ->faculty}}"/>
                                                            @error('faculty')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror       
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
                                                            <input type="text" class="form-control @error('board') is-invalid @enderror"
                                                                   name="board" value="{{$educ->board}}"/>
                                                            @error('board')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
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
                                                            <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                                                   name="degree" value="{{$educ->degree}}"/>
                                                            @error('degree')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror       
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
                                                            <input type="text" class="form-control @error('division') is-invalid @enderror"
                                                                   name="division" value="{{$educ->division}}"/>
                                                            @error('division')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror       
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
                                                                <input size="30" type="text" required readonly class="@error('passed_year') is-invalid @enderror"
                                                                       name="passed_year" aria-required="true" value="{{$educ->passed_year}}">
                                                                @error('passed_year')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                 @enderror      
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
                                                            <textarea name="about" class="form-control textarea  @error('about') is-invalid @enderror" required rows="10">{{old('about','')}}</textarea>
                                                            @error('about')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{old('address1','')}}"/>
                                                            @error('address1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{old('address2','')}}"/>
                                                            @error('address2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{old('phone1','')}}"/>
                                                            @error('phone1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{old('phone2','')}}"/>
                                                            @error('phone2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                                       name="dob" aria-required="true" value="{{old('dob','')}}" class=" @error('dob') is-invalid @enderror">
                                                                @error('dob')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                               @enderror   
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
                                                            <input type="file" class="form-control @error('ctzn_f') is-invalid @enderror" name="ctzn_f" value="{{old('ctzn_f','')}}"/>
                                                            @error('ctzn_f')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="file" class="form-control @error('ctzn_b') is-invalid @enderror" name="ctzn_b" value="{{old('ctzn_b','')}}"/>
                                                            @error('ctzn_b')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <textarea name="about" class="form-control textarea @error('about') is-invalid @enderror" required rows="10">{{old('about',$prsnl->about)}}</textarea>
                                                            @error('about')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{$prsnl->address1}}"/>
                                                            @error('address1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{$prsnl->address2}}"/>
                                                            @error('address2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{$prsnl->phone1}}"/>
                                                            @error('phone1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <input type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{$prsnl->phone2}}"/>
                                                            @error('phone2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                                <input size="30" type="text" required="" readonly class=" @error('dob') is-invalid @enderror"
                                                                       name="dob" aria-required="true" value="{{$prsnl->dob}}">
                                                                @error('dob')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror  
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
                                                            <textarea name="experience" class="form-control textarea @error('experience') is-invalid @enderror" required rows="10">{{old('experience','')}}</textarea>
                                                            @error('experience')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <textarea name="skills" class="form-control textarea @error('skills') is-invalid @enderror" required rows="10">{{old('skills','')}}</textarea>
                                                            @error('skills')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <textarea name="projects" class="form-control textarea @error('projects') is-invalid @enderror" required rows="10">{{old('projects','')}}</textarea>
                                                            @error('projects')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror                                                      
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
                                                            <textarea name="experience" class="form-control textarea @error('experience') is-invalid @enderror" required rows="10">{{old('experience',$wrk->experience)}}</textarea>
                                                            @error('experience')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <textarea name="skills" class="form-control textarea @error('skills') is-invalid @enderror" required rows="10">{{old('skills',$wrk->skills)}}</textarea>
                                                            @error('skills')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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
                                                            <textarea name="projects" class="form-control textarea @error('projects') is-invalid @enderror" required rows="10">{{old('projects',$wrk->projects)}}</textarea>
                                                            @error('projects')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror  
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