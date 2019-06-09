@extends('forum::layouts.master')

@section('page-name')
    {{'Family Extended Forum'}}
@stop

@section('page-content')

    <div class="col-table">
        <h1 class="bg-white content-heading border-bottom">Nuclear Forum</h1>
        <div class="col-separator-h"></div>
            <div class="row row-app">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-separator col-unscrollable box">
                        <div class="col-table">
                            <div class="col-table-row">
                                <div class="col-app col-unscrollable">
                                    <div class="col-app">
                                        <div class="list-group email-item-list">
                                            @foreach($family->nuclearFamilyMessages() as $nuclear_message)
	                                        	@foreach($nuclear_message->userMessages() as $message)
	                                            <span class="media">
	                                                <img width="40" height="40" src="assets/images/users/{{$message->profile->image->name}}"   class="img-circle user-img" />
	                                                <span class="media-body">
	                                                    <span class="label label-inverse pull-right">{{$message->message->created_at}}</span>
	                                                    <h4 class=" strong">{{$message->profile->user->first_name.' '.$message->'profile->user->last_name}} <i class="icon-flag text-primary icon-2x"></i></h4>
	                                                    <p class="list-group-item-text">$message->message->message </p>
	                                                </span>
	                                            </span><br />
	                                            @endforeach
                                            @endforeach
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
