<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
            	<li class="menu-title">Navigation</li>

                <li >
                    @php
                    if(profile()) {
                        $member = auth()->guard('family')->user();
                        $page = $member->first_name.' '.$member->last_name;
                        if($member->profile){
                            $page = $member->profile->thisProfileFamily()->name;
                        }
                    }else{
                        $page = 'administrator';
                    }
                    @endphp
                    <a href="{{route('home',[$page])}}" ><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    
                </li>
                @yield('side-bar')
        </div>
        <!-- Sidebar -->
        

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
