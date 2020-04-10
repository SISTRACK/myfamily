@extends('admin::layouts.master')

@section('page-content')    
    @if(empty($district->divorces()))
        <h3>{{'Divoreces record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table">
                <thead>
                    <tr>
                        <th>Wife Name</th>
                        <th>Family</th>
                        <th>Town</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Age</th>
                        <th>About</th>
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
                            	{{$divorec->marriage->wife->profile->user->first_name}} {{$death->profile->user->last_name}}
                            </td>
                            <td>
                            	{{$divorec->marriage->wife->profile->family->name}} 
                            </td>
                            <td>
                            	{{$divorec->marriage->husband->profile->family->location->area->town->name}} 
                            </td>
                            <td>
                            	{{date('Y',$divorce->date)}}
                            </td>
                            <td>
                            	{{date('M',$divorce->date)}}
                            </td>
                            <td>
                            	{{date('D',$divorce->date)}}
                            </td>
                            <td>
                            	{{$divorce->age()}} Years
                            </td>
                            
                            <td>{{$divorce->about_divorce}}</td>
                            
                            <td>{{count($divorce->marraige->wife->profile->numberOfBirths())}}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
    	</div>
    </div>
    @endif
@endsection