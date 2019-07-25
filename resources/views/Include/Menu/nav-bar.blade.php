<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{url('/')}}" class="logo"><span>NFa<span>mily</span></span><i class="mdi mdi-layers"></i></a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="hidden-xs">
                    <form role="search" class="app-search">
                        <input type="text" placeholder="Search family"
                               class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li> 
            </ul>

            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="badge up bg-success">4</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                        <li>
                            <h5>Notifications</h5>
                        </li>
                        <li>
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="mdi mdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-email"></i>
                        <span class="badge up bg-danger">1</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                        <li>
                            <h5>Messages</h5>
                        </li>
                        <li>
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/male.png" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Patricia Beach</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                        @if(auth()->guard('government')||auth()->guard('admin')||auth()->guard('doctor')||auth()->guard('teachar'))
                        <img src="assets/Profile/Images/male.png" alt="user-img" class="img-circle user-img">
                        @else
                            @if(Auth()->User()->profile != null)
                            <img src="{{Auth()->User()->profile->profileImageLocation('display').Auth()->User()->profile->image->name}}" alt="user-img" class="img-circle user-img">
                            @else
                            <img src="assets/Profile/Images/male.png" alt="user-img" class="img-circle user-img">
                            @endif
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        @if(auth()->guard('government')->check() || auth()->guard('admin')->check() || auth()->guard('doctor')->check() || auth()->guard('teachar')->check())

                        @else
                        <li>
                            <h5>Hi, {{Auth()->User()->first_name.' '.Auth()->User()->last_name}}</h5>
                        </li>
                        @endif
                        @if(profile())
                        <li><a href="{{route('family.member.profile',[profile()->thisProfileFamily()->name,profile()->id])}}"><i class="ti-user m-r-5"></i>Profile</a></li>
                        
                        <li><a href="{{route('family.member.profile.setting',[profile()->thisProfileFamily()->name,profile()->id])}}"><i class="ti-settings m-r-5"></i> Profile Configuration</a>
                        </li>
                        @endif
                        <li><a href="{{route('page.index')}}"><i class="ti-settings m-r-5"></i> Pages</a>
                        </li>

                        <li><a href="{{route('post.index')}}"><i class="ti-settings m-r-5"></i> Blog post</a>
                        </li>

                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul> <!-- end navbar-right -->

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
<!-- Top Bar End -->

