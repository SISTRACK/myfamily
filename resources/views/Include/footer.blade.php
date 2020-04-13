
   <script>
        var resizefunc = [];
    </script>
     <script src="{{ asset('js/app.js') }}"> </script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.6.7/c3.min.js"></script>
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
    <script src="{{ asset('js/jquery.wizard-init.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"> </script>
    <script>
        $(function() {
            $('#table').DataTable({
                
            });
        });
    </script>
    @yield('footer')
    
    <footer class="footer text-right">
        2017 - {{date('Y',time())}} © Khaliphate citizen information management system
    </footer>
