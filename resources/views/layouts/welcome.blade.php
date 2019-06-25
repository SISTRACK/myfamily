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
        <title>@yield('title')</title>

        <!-- App css -->
        <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href=" {{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <script src=" {{ asset('js/modernizr.min.js') }}"></script>
        @yield('head')
    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        @yield('content')
                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src=" {{ asset('js/jquery.min.js') }}"></script>
        <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
        <script src=" {{ asset('js/detect.js') }}"></script>
        <script src=" {{ asset('js/fastclick.js') }}"></script>
        <script src=" {{ asset('js/jquery.blockUI.js') }}"></script>
        <script src=" {{ asset('js/waves.js') }}"></script>
        <script src=" {{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src=" {{ asset('js/jquery.scrollTo.min.js') }}"></script>

        <!-- App js -->
        <script src=" {{ asset('js/jquery.core.js') }}"></script>
        <script src=" {{ asset('js/jquery.app.js') }}"></script>

    </body>
</html>