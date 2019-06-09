@extends('forum::layouts.master')

@section('page-content')
<div class="col-table">
    <h1 class="bg-white content-heading border-bottom">Extended Forum</h1>
        <div class="col-separator-h"></div>
            <div class="row row-app">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-separator col-unscrollable box">
                        <div class="col-table">
                            <div class="col-table-row">
                                <div class="col-app col-unscrollable">
                                    <div class="col-app">
                                        <div class="list-group email-item-list">
                                        	@foreach($family->extendedFamilyMessages as $extended_message)
	                                            <span class="media">
	                                                <img width="40" height="40" src="assets/images/users/{{$extended_message->userMessages->image()}}"   class="img-circle user-img" />
	                                                <span class="media-body">
	                                                    <span class="label label-inverse pull-right">{{$extended_message->userMessage->send_at()}}</span>
	                                                    <h4 class="strong">{{$extended_message->userMessages->sender()}} <i class="icon-flag text-primary icon-2x"></i></h4>
	                                                    <p class="list-group-item-text">{{$extended_message->message->message}} </p>
	                                                </span>
	                                            </span><br />
                                            @endforeach
                                            <span class="media">
                                                <form action="extended/message/send" method="post">
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
