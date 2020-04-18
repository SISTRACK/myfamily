@extends('admin::layouts.master')

@section('title')
    {{$district->name}} District registered deaths
@endsection

@section('header')
    @include('Include.Datatable.style')
@endsection

@section('page-content')    
    @if(empty($district->deaths()))
        <h3>{{'Deaths record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-striped table-bordered" id="datatable-buttons">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Family</th>
                        <th>Town</th>
                        <th>Area</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Age</th>
                        <th>Place</th>
                        <th>About</th>
                        <th>Wives</th>
                        <th>Children</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>
            	            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#newDeath">New Death</a>
                            @include('admin::Admin.Registration.Death.verifyFamily')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->deaths() as $death)
                        
                        <tr>
                            <td>
                                @if($death->profile->image->id > 2)
                                    <img src="{{stirage_url($death->profile->profilePicture())}}" width="35" height="35" />
                                @else
                                    <img src="{{asset($death->profile->profilePicture())}}" width="35" height="35" />
                                @endif
                            </td>

                            <td>
                            	{{$death->profile->user->first_name}} {{$death->profile->user->last_name}}
                            </td>

                            <td>
                            	{{$death->profile->family->name}} 
                            </td>

                            <td>
                            	{{$death->profile->family->location->area->town->name}} 
                            </td>

                            <td>
                            	{{$death->profile->family->location->area->name}} 
                            </td>

                            <td>
                            	{{date('Y',$death->date)}}
                            </td>

                            <td>
                            	{{date('M',$death->date)}}
                            </td>

                            <td>
                            	{{date('D',$death->date)}}
                            </td>

                            <td>
                            	{{$death->age()}} Years
                            </td>

                            <td>{{$death->place}}</td>
                            <td>{{$death->about_death}}</td>
                            <td>{{count($death->profile->numberOfWives())}}</td>
                            <td>{{count($death->profile->numberOfBirths())}}</td>
                            <td>{{$death->created_at}}</td>
                            <td>{{$death->updated_at}}</td>
                            <td>
                                <a href="{{route('district.family.death.edit',[$district->lga->state->name,$district->lga->name,$district->name,$death->profile->family->name,$death->id])}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
    	</div>
    </div>
    @endif
@endsection

@section('footer')
    @include('Include.Datatable.script')
@endsection