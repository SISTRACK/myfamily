@extends('admin::layouts.master')

@section('title')
    {{$district->name}} District registered births
@endsection

@section('header')
    @include('Include.Datatable.style')
@endsection

@section('page-content')
    @if(empty($district->births()))
        <h3>{{'Births record not found in '.$district->name.' District'}} <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newBirth">Register One</a>
                                @include('admin::Admin.Registration.Birth.verifyFamily')</h3>
    @else
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-bordered" id="D-buttons">
                    <thead>
                        <tr>
                            <th>Child Picture</th>
                            <th>Father</th>
                            <th>Mother</th>
                            <th>Child</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Day</th>
                            <th>Place</th>
                            <th>Deliver At</th>
                            <th>Town</th>
                            <th>Area</th>
                            <th>Family</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>
            	                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newBirth">New Birth</a>
                                @include('admin::Admin.Registration.Birth.verifyFamily')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($district->births() as $birth)
                            <tr>
                            <td>
                                @if($birth->child->profile->image->id > 2)
                                    <img src="{{stirage_url($birth->child->profile->profilePicture())}}" width="35" height="35" />
                                @else
                                    <img src="{{asset($birth->child->profile->profilePicture())}}" width="35" height="35" />
                                @endif
                            </td>
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
                                    {{date('Y',$birth->date)}}
                                </td>
                                <td>
                                    {{date('M',$birth->date)}}
                                </td>
                                <td>
                                    {{date('D',$birth->date)}}
                                </td>
                                <td>{{$birth->place}}</td>
                                <td>{{$birth->deliver_at}}</td>
                                <td>{{$birth->father->husband->profile->family->location->area->town->name}}</td>
                                <td>{{$birth->father->husband->profile->family->location->area->name}}</td>
                                <td>{{$birth->father->husband->profile->family->name}}</td>
                                <td>{{$birth->created_at}}</td>
                                <td>{{$birth->updated_at}}</td>
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

@section('footer')
    @include('Include.Datatable.script')
@endsection
