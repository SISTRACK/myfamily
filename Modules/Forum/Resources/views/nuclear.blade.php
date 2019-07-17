@extends('forum::layouts.master')

@section('page-title')
    {{ Breadcrumbs::render('family.member.nuclear.forum',[profile()->family]) }}
@endsection
@section('page-content')
    <div class="col-table">
        <div class="col-separator-h"></div>
            <div class="row row-app">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-separator col-unscrollable box">
                        <div class="col-table">
                            <div class="col-table-row">
                                <div class="col-app col-unscrollable">
                                    <div class="col-app">
                                        <div class="list-group email-item-list">
                                            @foreach($family->nuclearFamilyMessages as $nuclear_message)
	                                            <span class="media">
	                                                <img width="40" height="40" src="{{$nuclear_message->userMessage->image().$nuclear_message->userMessage->profile->image->name}}"   class="img-circle user-img" />
	                                                <span class="media-body">
	                                                    <span class="label label-inverse pull-right">{{$nuclear_message->userMessage->send_at()}}</span>
	                                                    <h4 class="strong">{{$nuclear_message->userMessage->sender()}} <i class="icon-flag text-primary icon-2x"></i></h4>
	                                                    <p class="list-group-item-text">{{$nuclear_message->userMessage->message->message}} </p>
	                                                </span>
	                                            </span><br />
                                            @endforeach
                                            <br>
                                            <br>
                                            <span class="media">
                                                <form action="nuclear/message/send" method="post">
                                                	@csrf
                                                	<textarea placeholder="Message" name="message" class="form-control"></textarea>
                                                	<button type="submit" class="btn btn-primary">Send</button>
                                                </form>
                                            </span><br />                                                     
                                        </div>
                                    </div>
                        
                                </div>
                    
                            </div>
                
                        </div>
            
                    </div>
       
                </div> 
    
            </div>
    </div>

		
		
@stop
