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
        <title>Khaliphate citizen information management system</title>

        <!-- App css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/core.css')}}" rel="stylesheet" />
        <link href="{{asset('css/components.css')}}" rel="stylesheet" />
        <link href="{{asset('css/icons.css')}}" rel="stylesheet" />
        <link href="{{asset('css/pages.css')}}" rel="stylesheet" />
        <link href="{{asset('css/menu.css')}}" rel="stylesheet" />
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/switchery.min.css')}}" />
        <link rel="stylesheet" href="{{asset('js/plugins/morris/morris.css')}}">
        
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
                       <br>
                       <br>
                       <br>
                       @include('healthReport')
                       <br>
                       <br>
                       <br>
                       @include('educationReport')
                       <br>
                       <br>
                       <br>
                       @include('countDown')




                    
                        
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h4 class="center">Timeline</h4>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="timeline">
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show first">
                                                <a href="#" class="btn btn-danger w-lg">Today</a>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="">1 hour ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The test family was the most populated family in Sokoto? </p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item ">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-success"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="text-success">1 hours ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The Kware local government is the most populated local government in Sokoto </p>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon bg-primary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="text-primary">1 hours ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The Tambuwal District is the most populated district in Sokoto</p>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show">
                                                <a href="#" class="btn btn-danger w-lg">Last Month</a>
                                            </div>
                                        </div>
                                    </article>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    {{date('Y',time())}} © My Family My Pride.
                </footer>

            </div>


            
        </div>
        <!-- END wrapper -->



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

        <!-- Dashboard init -->
        <script src="{{asset('js/pages/jquery.dashboard.js')}}"></script>

        <script src="{{asset('js/jquery.app.js')}}"></script>
    </body>
</html>