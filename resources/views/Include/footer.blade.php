
   <script>
        var resizefunc = [];
    </script>
     <script src="{{ asset('js/app.js') }}"> </script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- jQuery  -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/detect.js') }}"></script>
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/switchery.min.js') }}"></script>
    
    <!-- Counter js  -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

    <!--Morris Chart-->
	<script src="{{ asset('js/morris.min.js')}} "></script>
	<script src="{{ asset('js/raphael-min.js')}} "></script>

    <!-- Dashboard init -->
    <script src="{{ asset('js/jquery.dashboard.js') }}"></script>
    <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
    <script src="{{ asset('js/jquery.knob.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>

    <!--Form Wizard-->

    <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

   

    <!--wizard initialization-->
    <script src="assets/pages/{{ asset('js/jquery.wizard-init.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"> </script>

    @yield('footer')
    
    <footer class="footer text-right">
        2017 - {{date('Y',time())}} © Nigerian family innformation system
    </footer>
