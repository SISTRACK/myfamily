@extends('event::layouts.master')

@section('page-title')
    {{'Available Family Event'}}
@endsection

@section('page-content')
<div class="col-md-8 col-md-offset-2">
    @if($family)
    @foreach($family->events as $family_event        )
    <div class="widget">

        <div class="innerAll half bg-primary border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                <i class="fa fa-fw fa-calendar fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{date('D/M/Y',$family_event->event->date)}}</p>
                    <p class="strong margin-none">{{'Time: From '.date('h:m:s a',$family_event->event->start_time)}}  {{'To '.date('h:m:s a',$family_event->event->end_time)}}</p>
                    <p class="strong margin-none">{{'Remains '.$family_event->event->timeRemain($family_event->event->date,$family_event->event->start_time)}}</p>
                    <p class="strong margin-none">{{'Announcer : '.$family_event->event->profile->user->first_name.''.$family_event->event->profile->user->last_name}}</p>
                    <p class="strong margin-none">{{'Family : '.$family_event->family->name}}</p>
                </div>
            </div>
        </div>

        <div class="innerAll half bg-gray border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                    <i class="fa fa-fw fa-map-marker fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{$family_event->event->description}}</p>
                    <p class="strong margin-none">{{'Address : '.$family_event->event->address}}</p>
                </div> 
            </div>
        </div>
        
        <div class="row"> <br>
            <div class="col-md-12 h4 text-center text-primary">
                    {{$family_event->event->description}}
            </div>
        </div>
           
        <div class="innerAll text-center half">
            <div class="btn-group">
                <a href="event/{{$family_event->event->id}}/attend" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Attend</a>
                <a href="event/{{$family_event->event->id}}/might_attend" class="btn btn-default">I might go</a>
                </div>
        </div>
        
    </div>
    <div class="widget">
        <div class="innerAll half">
            <span class="badge badge-success">{{$family_event->event->attending()}}</span> Attending
            <div class="innerAll half text-center">
                @foreach($family_event->event->familyMembersThatAreAttending() as $attending)
                <a href="#" class="border-none">
                    <img src="assets/images/users/{{$attending->image->name}}" alt="photo" width="35" class="innerB half">
                </a>
                @endforeach
            </div>
        </div>
    
        <div class="innerAll half">
            <span class="badge badge-warning">{{$family_event->event->mightAttend()}}</span> Might Go
            <div class="innerAll half text-center">
                @foreach($family_event->event->familyMembersThatMightAttend() as $might_attend)
                <a href="#" class="border-none">
                    <img src="assets/images/users/{{$might_attend->image->name}}" alt="photo" width="35" class="innerB half">
                </a>
                @endforeach	
            </div>
        </div>
    </div>
@endforeach
@else
<div class="alert alert-danger">{{'There is no vailable event'}}</div>
@endif
</div>
@stop
