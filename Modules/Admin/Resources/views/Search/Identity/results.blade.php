@extends('admin::layouts.master')

@section('page-title')
    {{'search family member identity '}}
@stop

@section('page-content')
<div class="col-md-8 col-md-offset-2"><br /><br />
    @if(!empty($results))
    <div class="panel pane-deafault">
        <div class="panel-body h4">
            @foreach($results as $result)
                <div class="row">
                    <div class="col-sm-12">
                    <button class ="btn btn-primary btn-block h4">{{$result['gen_no'].' Generation'}}</button>
                    </div>
                </div> <br>
                @foreach($result['gen_data'] as $generation_data)
                    @foreach($generation_data as $data)
	                <div class="row">
	                    <div class="col-sm-4">
	                    </div>
	                    <div class="col-sm-4">
	                    	@if($data['status'] == 'child')

		                    <a href="#" data-toggle="modal" data-target="#{{$data['profile']->user->id}}">
		                        <div class="row">
		                            <div class="panel panel-default">
		                                <div class="panel-footer text-primary">Child</div>
		                                <div class="panel-body">
		                                <img height="120" width="100%" src="{{$data['profile']->profileImageLocation('display').$data['profile']->image->name}}" alt="">                                
		                                </div>
		                                <div class="panel-footer">
		                                {{$data['profile']->user->first_name.' '.$data['profile']->user->last_name}}
		                                </div>
		                            </div>
		                        </div>
		                    </a>
	                        @endif
	                    </div>
	                </div> <br>
                    <div class="row">
	                	<div class="col-sm-2">
	                    </div>
		                <div class="col-sm-4">
		                    @if($data['status'] == 'father')
		                    <a href="#" data-toggle="modal" data-target="#{{$data['profile']->user->id}}">
		                        <div class="row">
		                            <div class="panel panel-default">
		                                <div class="panel-footer text-primary">Father</div>
		                                <div class="panel-body">
		                                <img height="120" width="100%" src="{{$data['profile']->profileImageLocation('display').$data['profile']->image->name}}" alt="">                                    
		                                </div>
		                                <div class="panel-footer">
		                                    {{$data['profile']->user->first_name.' '.$data['profile']->user->last_name}}
		                                </div>
		                            </div>
		                        </div>
		                    </a>
		                    @endif
		                </div>
		                <div class="col-sm-4">
		                	@if($data['status'] == 'mother')
		                    <a href="#" data-toggle="modal" data-target="#{{$data['profile']->user->id}}">
		                    <div class="row">
		                        <div class="panel panel-default">
		                            <div class="panel-footer text-primary">Mother
		                            </div>
	                                <div class="panel-body">
	                                    <img height="120" width="100%" src="{{$data['profile']->profileImageLocation('display').$data['profile']->image->name}}" alt="">
	                                </div>
	                                <div class="panel-footer">
	                                    {{$data['profile']->user->first_name.' '.$data['profile']->user->last_name}}
	                                </div>
		                        </div>
		                    </div>
		                    </a>
		                    @endif
		                </div><br>
	                </div>
	                @include('search::Modals.generation')
	                @endforeach
                @endforeach
                <hr>
            @endforeach
            </div>
        </div>
        @endif
    </div>
@stop
@section('footer')

@stop