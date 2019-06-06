@extends('search::layouts.master')

@section('page-title')
    {{'search family member identity '}}
@stop

@section('page-content')
@if(session('gen_result'))
<div class="col-md-8 col-md-offset-2"><br /><br />
        <div class="panel pane-deafault">
        <div class="panel-body h4">
                @foreach(session('gen_result') as $result)
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
		                                <img height="120" width="100%" src="assets/images/users/{{$data['profile']->image->name}}" alt="">                                
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
		                                <img height="120" width="100%" src="assets/images/users/{{$data['profile']->image->name}}" alt="">                                    
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
	                                    <img height="120" width="100%" src="assets/images/users/{{$data['profile']->image->name}}" alt="">
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
    </div>

@elseif(session('users_result'))

    @foreach(session('users_result') as $user_result)
    <div class="col-md-8 col-md-offset-2"><br /><br />
        <div class="panel pane-deafault">
        <div class="panel-body">
                <div class="row">
                <div class="col-md-3">
                <img height="160" weight="160" src="assets/images/users/{{$user_result->profile->image->name}}" alt="">
                </div>
                    <div class="col-md-7 col-md-offset-2">
                        <table>
                            <tr>
                                <td>Name : </td>
                                <td>{{$user_result->first_name.' '.$user_result->last_name}}</td>
                            </tr>
                           
                            <tr>
                                <td width="120">Marrital Status : </td>
                                <td>{{$user_result->profile->maritalStatus->name}}</td>
                            </tr>
                            <tr>
                                <td width="120">Number Of Wives : </td>
                                <td>{{ count($user_result->profile->numberOfWives())}}</td>
                            </tr>
                            <tr>
                                <td>Birth : </td>
                                <td>{{count($user_result->profile->numberOfBirths())}}</td>
                            </tr>
                            
                            <tr>
                                <td>Family : </td>
                                <td>{{$user_result->profile->family->name}}</td>
                            </tr>
                            <tr>
                                <td>Local Government</td>
                                <td>{{$user_result->profile->address()['lga']}}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{$user_result->profile->address()['district']}}</td>
                            </tr>
                            <tr>
                                <td>Town/Village : </td>
                                <td>{{$user_result->profile->address()['town']}}</td>
                            </tr>
                            <form action="search/generation" method="post">
                            	@csrf
                            	<input type="hidden" name="id" value="{{$user_result->id}}">
                            <tr>
                                <td></td>
                                <td> <button type= "submit" class="btn btn-primary">Search Generation</button></td>
                            </tr>	
                            </form>
                            
                        </table>
                    </div>
                </div>
                <br>
                
            </div>
        </div>
    </div>
    @endforeach
@elseif(session('generation'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Generation Information</h1><hr>     
        <form action="search" method="post">
            @csrf
            <label for="">Number Of Generation :</label>
            <input type="text" name="gen_no" class="form-control" placeholder="Enter Number of geration "/>
            <label for=""></label>
            <input type="submit" name="generation" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>

@else
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Personal Information</h1><hr>     
        <form action="search" method="post">
            @csrf
            <label for="">First Name :</label>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name"/>
            <label for="">Last Name :</label>
            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name"/>
            <label for=""></label>
            <input type="submit" name="search_identity" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endif
@stop
@section('footer')

@stop