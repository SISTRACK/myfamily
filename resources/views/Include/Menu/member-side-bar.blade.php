    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-pencil-square-o"></i> <span> Registration </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="#" data-toggle="modal" data-target="#newBirth"><i class="fa fa-baby"></i> <span>Birth</span></a></li>
            // this modal will be included in Resources/Views/Iclude/pages/content
            <li><a href="#" data-toggle="modal" data-target="#newMarriage">Marriage</a></li>
            // this modal will be included in Resources/Views/Iclude/pages/content
            @if(profile()->husband && canDivorce())
            <li><a href="{{route('family.divorce.create',[profile()->thisProfileFamily()->name])}}">Divorce</a></li>
            @endif
            <li><a href="{{route('family.death.create',[profile()->thisProfileFamily()->name])}}"><i class="fa fa-book-dead"></i><span>Death</span> </a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-event "></i> <span> Family Event </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><i class="fa fa-event_note "></i><a href="{{route('event.create')}}"><span>New Event</span></a></li>
            <li><i class="fa fa-event_available "></i><a href="{{route('event.index')}}"><span>Available Event</span></a></li>
            <li><i class="fa fa-announcement "></i><a href="#"><span>Announce</span></a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-address-book"></i> <span> Profiles </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><i class="fa fa-address-book"></i><a href="{{route('family.member.profile',[profile()->thisProfileFamily()->name,profile()->id])}}"><span>My Profile</span></a></li>
            <li><i class="fa fa-address-book"></i><a href="#"><span>My Child Profile</span></a></li>
            <li><i class="fa fa-address-book"></i><a href="#">My Wife Profile</a></li>
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






    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-certificate "></i> <span> Certificate </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="#">Birth Certificate</a></li>
            <li><a href="#">Marriage Certificate</a></li>
        </ul>
    </li>
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
            <li><a href="#">Merge My Family</a></li>
            <li><a href="#">Merge To Family</a></li>
            <li><a href="#">Merge From Family</a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar </span></a>
    </li>
