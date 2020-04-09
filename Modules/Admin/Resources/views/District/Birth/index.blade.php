@extends('admin::layouts.master')

@section('page-content')
    @if(empty($district->births()))
        <h3>{{'Births record not found in '.$district->name.' District'}}</h3>
    @else
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Father</th>
                            <th>Mother</th>
                            <th>Child</th>
                            <th>Date Of Birth</th>
                            <th>Place Of Birth</th>
                            <th>Deliver At</th>
                            <th>Town</th>
                            <th>Area</th>
                            <th>Family</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($district->births() as $birth)
                            
                            <tr>
                                <td>
                                    {{$birth->father->husband->profile->user->first_name}} {{$birth->father->husband->profile->user->last_name}}
                                </td>
                                <td>
                                    {{$birth->mother->wife->profile->user->first_name}} 
                                    {{$birth->mother->wife->profile->user->last_name}}
                                </td>
                                <td>
                                    {{$birth->child->profile->user->first_name}} 
                                    {{$birth->child->profile->user->last_name}}
                                </td>
                                <td>
                                    {{date('d/M/Y',$birth->date)}}
                                </td>
                                <td>{{$birth->place}}</td>
                                <td>{{$birth->deliver_at}}</td>
                                <td>{{$birth->father->husband->profile->family->location->area->town->name}}</td>
                                <td>{{$birth->father->husband->profile->family->location->area->name}}</td>
                                <td>{{$birth->father->husband->profile->family->name}}</td>
                               
                                <td>
                                    <a href="{{route('district.family.birth.edit',[$district->lga->state->name,$district->lga->name,$district->name,$birth->father->husband->profile->family->name,$birth->id])}}" class="btn btn-warning">Edit</a>
                                
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection