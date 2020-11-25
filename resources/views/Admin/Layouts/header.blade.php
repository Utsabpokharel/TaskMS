@section('header')

    <body
            class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper" id="app">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="{{route('admin-dashboard')}}">
                        <span class="logo-icon material-icons fa-rotate-45">book</span>
                        <span class="logo-default">Task-MS</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="index.html#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                   data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                        <!-- start language menu -->

                        <!-- end language menu -->
                        <!-- start notification dropdown -->


                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1"> {{count(auth()->user()->unreadNotifications)}} </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label purple-bgcolor">New {{count(auth()->user()->unreadNotifications)}}</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach(auth()->user()->unreadNotifications as $notification )
                                            <li>
                                                @if($notification->type=='App\Notifications\UserNotification')
                                                <a href="{{route('Usermarkasread')}}">
                                                    <span class="time">just now</span>
                                                    <span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
                                                                class="fa fa-check"></i></span>

                                                            <b>{{$notification->data['thread']['added_by']}}</b> added
                                                            new user ,
                                                            <b>{{$notification->data['thread']['added_to']}}</b></span>
                                                </a>
                                                @elseif($notification->type=='App\Notifications\TaskNotification')
                                                    <a href="{{route('Taskmarkasread')}}">
                                                        <span class="time">just now</span>
                                                        <span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
                                                                class="fa fa-check"></i></span>

                                                            <b>{{$notification->data['thread']['assignedBy']}} </b> Assigned you a new task</span>
                                                    </a>

                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)"> All notifications </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->

                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                @if(Auth::user()->image)
                                <img class="img-circle " src="{{asset('Uploads/UserImage/'.Auth::user()->image)}}"
                                     alt="img"/>
                                @endif
                                <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('user_profile')}}">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="{{route('update_profile')}}">
                                        <i class="icon-settings"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                        <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
@endsection