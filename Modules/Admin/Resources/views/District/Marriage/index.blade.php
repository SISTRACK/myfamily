@extends('admin::layouts.master')

@section('page-content')    
    @if(empty($district->marriages()))
        <h3>{{'Marriages record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Husband</th>
                        <th>Wife</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Age</th>
                        <th>Town/Village</th>
                        <th>Area</th>
                        <th>Family</th>
                        <th>BirthS</th>
                        <th>
	                    	<a class="btn btn-success" data-toggle="modal" data-target="#newMarriage">New Marriage</a>
                            @include('admin::Admin.Registration.Marriage.verifyFamily')
                        </th>
                    </tr>
                </thead>
                <tbody>
                	
                    @foreach($district->marriages() as $marriage)
                        
                        <tr>
                            <td>{{$marriage->husband->profile->user->first_name}} {{$marriage->husband->profile->user->last_name}}</td>
                            <td>{{$marriage->wife->profile->user->first_name}} {{$marriage->wife->profile->user->last_name}}</td>
                            <td>{{date('Y',$marriage->date)}}</td>
                            <td>{{date('M',$marriage->date)}}</td>
                            <td>{{date('D',$marriage->date)}}</td>
                            <td>{{$marriage->age()}} Years</td>
                            <td>{{$marriage->husband->profile->family->location->area->town->name}}</td>
                            <td>{{$marriage->husband->profile->family->location->area->name}}</td>
                            <td>{{$marriage->husband->profile->family->name}}</td>
                            <td>{{!is_null($marriage->wife->mother) ? count($marriage->wife->mother->births) : '0'}}</td>
                            <td>
                                <a href="{{route('district.family.marriage.edit',[$district->lga->state->name,$district->lga->name,$district->name,$marriage->husband->profile->family->location->area->town->name,$marriage->husband->profile->family->name,$marriage->id])}}" class="btn btn-warning">Edit</a><br>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection    