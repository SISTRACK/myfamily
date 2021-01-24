<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>My Family Welcome Page</title>

        <!-- App css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/core.css')}}" rel="stylesheet" />
        <link href="{{asset('css/components.css')}}" rel="stylesheet" />
        <link href="{{asset('css/icons.css')}}" rel="stylesheet" />
        <link href="{{asset('css/pages.css')}}" rel="stylesheet" />
        <link href="{{asset('css/menu.css')}}" rel="stylesheet" />
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/switchery.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/morris.css')}}">
        
        <script src="{{asset('js/modernizr.min.js')}}"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-inverse" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
    
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                           
                            
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{route('family.login')}}">Sign In</a>

                            </li>

                            <li>
                                <a href="{{route('signup')}}">Sign Up</a>

                            </li>
                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <div id="demo"></div>
            <div class="content-pages">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @include('populationReport')
                        @include('educationReport')
                        @include('healthReport')
                        @include('countDown')
                        @include('timeLine')
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>
            
            <footer class="footer text-right">
                {{date('Y',time())}} © My Family My Pride.
            </footer>
        </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/detect.js')}}"></script>
        <script src="{{asset('js/fastclick.js')}}"></script>
        <script src="{{asset('js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('js/waves.js')}}"></script>
        <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('js/switchery.min.js')}}"></script>
        <script src="{{asset('js/jquery.core.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{asset('js/plugins/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/plugins/jquery.counterup.min.js')}}"></script>

        <!--Morris Chart-->
		<script src="{{asset('js/plugins/morris.min.js')}}"></script>
		<script src="{{asset('js/plugins/raphael-min.js')}}"></script>
        
		<script src="{{asset('js/pages/jquery.morris.init.js')}}"></script>
        <!-- Dashboard init -->
        <script src="{{asset('js/pages/jquery.dashboard.js')}}"></script>

        <script src="{{asset('js/jquery.app.js')}}"></script>
    </body>
</html>