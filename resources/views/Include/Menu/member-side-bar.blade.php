    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-pencil-square-o"></i> <span> Registration </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li>
               <a href="#" data-toggle="modal" data-target="#newBirth">
                   <i class="mdi mdi-baby"></i> <span>Birth</span>
                </a>
            </li>
            <!-- this modal will be included in Resources/Views/Iclude/pages/content -->
            <li><a href="#" data-toggle="modal" data-target="#newMarriage">
                <i class="mdi mdi-account-plus"></i> <span>Marriage</span> </a>
            </li>
            <!-- this modal will be included in Resources/Views/Iclude/pages/content -->
            @if(profile()->husband && canDivorce())
            <li><a href="{{route('family.divorce.create',[profile()->thisProfileFamily()->name])}}">
                <i class="mdi mdi-account-minus"></i><span>Divorce</span></a>
            </li>
            @endif
            <li><a href="#" data-toggle="modal" data-target="#newDeath">
                <i class="mdi mdi-sleep-off"></i><span>Death</span> </a>
            </li>
             <!-- this modal will be included in Resources/Views/Iclude/pages/content -->
        </ul>
    </li>
    
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-calendar-multiple "></i> <span> Family Event </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('event.create')}}"><i class="mdi mdi-calendar-plus"></i><span>New Event</span></a></li>
            <li><a href="{{route('event.index')}}"><i class="mdi mdi-view-list"></i><span>Available Event</span></a></li>
            <li><a href="#"><i class="mdi mdi-bell-plus "></i><span>Announce</span></a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-box "></i> <span> Profiles </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="{{route('family.member.profile',[profile()->thisProfileFamily()->name,profile()->id])}}">
                <i class=" mdi mdi-account-box "></i><span>My Profile</span>
                </a>
            </li>    
            <li><a href="#"><i class=" mdi mdi-account-box "></i><span>My Child Profile</span></a></li>
            <li><a href="#"><i class=" mdi mdi-account-box "></i><span>My Wife Profile</span></a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-forum "></i> <span> Forum </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('nuclear.forum.index',[profile()->thisProfileFamily()->name,'nuclear-forum'])}}">Nuclear Forum</a></li>
            <li><a href="{{route('extended.forum.index',[profile()->thisProfileFamily()->name,'extended-family'])}}">Extended Forum</a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-file-image "></i> <span> Gallary </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('family.gallary.private.index',[profile()->thisProfileFamily()->name])}}">My Gallary</a></li>
            <li><a href="{{route('family.gallary.nuclear.index',[profile()->thisProfileFamily()->name])}}">Nuclear Family Gally</a></li>
            <li><a href="{{route('family.gallary.extended.index',[profile()->thisProfileFamily()->name])}}">Extended Family Gallary</a></li>
        </ul>
    </li>
    
    <!-- <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-certificate "></i> <span> Certificate </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="#">Birth Certificate</a></li>
            <li><a href="#">Marriage Certificate</a></li>
        </ul>
    </li> -->
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Search </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="/search_identity">Identity</a></li>
            <li><a href="{{route('search.relative.index')}}">Relatives</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-call-merge " ></i> <span> Merge Family </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="#"><i class="mdi mdi-call-merge " ></i><span>Merge My Family</span></a></li>
            <li><a href="#"><i class="mdi mdi-call-merge " ></i><span>Merge To Family</span></a></li>
            <li><a href="#"><i class="mdi mdi-call-merge " ></i><span>Merge From Family</span></a></li>
        </ul>
    </li>
    <!-- <li>
        <a href="#" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar </span></a>
    </li> -->
