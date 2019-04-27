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
                <a href="event/{{$family_event->id}}/attend" class="btn btn-success"><i class="fa fa-fw fa-check"></i>I will Attend</a>
                <a href="event/{{$family_event->id}}/might_attend" class="btn btn-default">I might Attend</a>
                
            </div>
        </div>
    <div class="widget">
        <div class="innerAll half">
            <span class="badge badge-success">{{$family_event->event->attending()}}</span> Attending
            <div class="innerAll half text-center">
                @foreach($family_event->event->familyMembersThatAreAttending() as $attending)
                <a href="#" class="border-none">
                    <img src="assets/images/users/{{$attending->image->name}}" alt="photo" width="35" class="innerB half" data-toggle="modal" data-target="#attending">
                </a>
                <!-- modal -->
                <div class="modal fade" id="attending" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="assets/images/users/{{$attending->image->name}}" alt="photo" width="150" class="innerB half">
                                </div>
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$attending->user->first_name.' '.$attending->user->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$attending->gender->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>
                                                @if($attending->child == null)
                                                {{floor($attending->date_of_birth/31556926)}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td>{{$attending->maritalStatus->name}}</td>
                                        </tr>
                                        @if($attending->husband != null)
                                        <tr>
                                            <td>Birth</td>
                                            <td>
                                                @if($attending->gender->name == 'Male')
                                                    {{$attending->husband->father != null ? count($attending->birth()) : 0}}
                                                @else
                                                    {{$attending->wife->mother != null ? count($attending->birth()) : 0}}
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>Working At</td>
                                            <td>
                                                {{$attending->work != null ? $attending->work->address->office->company->name : 'Not Working'}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- end modal -->
                @endforeach
            </div>
        </div>
    
        <div class="innerAll half">
            <span class="badge badge-warning">{{$family_event->event->mightAttend()}}</span> Might Go
            <div class="innerAll half text-center">
                @foreach($family_event->event->familyMembersThatMightAttend() as $might_attend)
                <a href="#" class="border-none">
                    <img src="assets/images/users/{{$might_attend->image->name}}" alt="photo" width="35" class="innerB half" data-toggle="modal" data-target="#might_attend">
                </a>
                <div class="modal fade" id="might_attend" role="dialog">
                    <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="assets/images/users/{{$might_attend->image->name}}" alt="photo" width="150" class="innerB half">
                                </div>
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$might_attend->user->first_name.' '.$might_attend->user->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$might_attend->gender->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>
                                                @if($might_attend->child == null)
                                                {{floor((time() - $might_attend->date_of_birth)/31556926)}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td>{{$might_attend->maritalStatus->name}}</td>
                                        </tr>
                                        @if($might_attend->husband != null)
                                        <tr>
                                            <td>Birth</td>
                                            <td>
                                                @if($might_attend->gender->name == 'Male')
                                                    {{$might_attend->husband->father != null ? count($might_attend->birth()) : 0}}
                                                @else
                                                    {{$might_attend->wife->mother != null ? count($might_attend->birth()) : 0}}
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>Working At</td>
                                            <td>
                                                {{$might_attend->work != null ? $might_attend->work->address->office->company->name : 'Not Working'}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- end modal -->
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
