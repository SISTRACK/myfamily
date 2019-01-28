@extends('event::layouts.master')

@section('page-title')
    {{'Available Family Event'}}
@endsection

@section('page-content')
<div class="col-md-8 col-md-offset-2">
    @if($family)
    @foreach($family->events as $famil_event)
    <div class="widget">

        <div class="innerAll half bg-primary border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                <i class="fa fa-fw fa-calendar fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{date('D/M/Y',$famil_event->event->date)}}</p>
                    <p class="strong margin-none">{{'Time: From '.date('h:m:s a',$famil_event->event->start_time)}}  {{'To '.date('h:m:s a',$famil_event->event->end_time)}}</p>
                    <p class="strong margin-none">{{'20 days Remain To Event'}}</p>
                    <p class="strong margin-none">{{'Announcer : '.$famil_event->event->profile->user->first_name.''.$famil_event->event->profile->user->last_name}}</p>
                    <p class="strong margin-none">{{'Family : '.$famil_event->family->name}}</p>
                </div>
            </div>
        </div>

        <div class="innerAll half bg-gray border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                    <i class="fa fa-fw fa-map-marker fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{$famil_event->event->description}}</p>
                    <p class="strong margin-none">{{'Address : '.$famil_event->event->address}}</p>
                </div> 
            </div>
        </div>
        
        <div class="row"> <br>
            <div class="col-md-12 h4 text-center text-primary">
                    {{$famil_event->event->description}}
            </div>
        </div>
           
        <div class="innerAll text-center half">
            <div class="btn-group">
                <a href="#" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Attend</a>
                <a href="#"class="btn btn-default">I might go</a>
                </div>
        </div>
        
    </div>
    <div class="widget">
        <div class="innerAll half">
            <span class="badge badge-success">{{'1'}}</span> Attending
            <div class="innerAll half text-center">
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
            </div>
        </div>
    
        <div class="innerAll half">
            <span class="badge badge-warning">{{'4'}}</span> Might Go
            <div class="innerAll half text-center">
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>	
            </div>
        </div>
    </div>
@endforeach
@else
<div class="alert alert-danger">{{'There is no vailable event'}}</div>
@endif
</div>
@stop
