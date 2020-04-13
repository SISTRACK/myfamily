@extends('admin::layouts.master')

@section('page-content')    
    @if(empty($district->deaths()))
        <h3>{{'Deaths record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table" id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Family</th>
                        <th>Town</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Age</th>
                        <th>Place</th>
                        <th>About</th>
                        <th>Wives</th>
                        <th>Children</th>
                        <th>
            	            <a class="btn btn-success" href="{{route('district.deaths.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Death</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->deaths() as $death)
                        
                        <tr>
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