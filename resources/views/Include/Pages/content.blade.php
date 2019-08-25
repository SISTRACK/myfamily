<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
					<div class="col-xs-12">
						<div class="block-header">
                            <h4>@yield('page-title')</h4>
                        </div>
					</div>
				</div>
                <!-- end row -->

                <div class="row">
                    @include('Include.Pages.message')
                    @if(profile())
                        @include('gallary::Modals.create_album')
                    @endif
                    
                    @if(admin() && admin()->state)
                        @include('admin::Admin.Modals.new_lga')
                    @endif
                    @yield('page-content')
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
    <!-- /Right-bar -->
</div>
<!-- END wrapper -->