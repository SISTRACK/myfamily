
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>@yield('title')</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{ asset('css/morris.css') }}">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/core.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components.css') }}" rel="stylesheet">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/switchery.min.css') }}" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--form wizard CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}" />
        
        <script src="{{ asset('js/modernizr.min.js') }}"></script>

         
        @yield('header')
    </head>