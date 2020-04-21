@extends('admin::layouts.master')

@section('title')
   {{$district->name}} District list of people
@endsection
 
@section('header')
    @include('Include.Datatable.style')
@endsection

@section('page-content')                            
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered" id="datatable-buttons">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>FID No</th>
                        <th>Age</th>
                        <th>Education Level</th>
                        <th>Health Status</th>
                        <th>Births</th>
                        <th>Father</th>
                        <th>Mother</th>
                        <th>E-mail Address</th>
                        <th>Phone</th>
                        <th>Marital Status</th>
                        <th>Gender</th>
                        <th>Family</th>
                        <th>Town</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->users() as $user)
                        
                        <tr>
                            <td>
                                @if($user->profile->image->id > 2)
                                    <img src="{{stirage_url($user->profile->profilePicture())}}" width="35" height="35" />
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" width="35" height="35" />
                                @endif
                            </td>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->profile->FID}}</td>
                            <td>{{$user->profile->years()}}</td>
                            <td>{{$user->profile->educationLevel()}}</td>
                            <td>{{$user->profile->healthStatus()}}</td>
                            <td>
                           {{count($user->profile->birth())}}
                            </td>
                            <td>
                                @if($user->profile->child)
                                {{$user->profile->child->birth->father->husband->profile->user->first_name}} 
                                {{$user->profile->child->birth->father->husband->profile->user->last_name}}
                                @else
                                Not Available
                                @endif
                            </td>
                            <td>
                                @if($user->profile->child)
                                {{$user->profile->child->birth->mother->wife->profile->user->first_name}} 
                                {{$user->profile->child->birth->mother->wife->profile->user->last_name}}
                                @else
                                Not Available
                                @endif
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->profile ? $user->profile->maritalStatus->name : 'Not Available'}}</td>
                            <td>{{$user->profile ? $user->profile->gender->name : 'Not Available'}}</td>
                            <td>{{$user->profile->thisProfileFamily()->name}}</td>
                            <td>{{$user->profile->thisProfileFamily()->location->area->town->name}}</td>
                            <td>{{$user->profile->thisProfileFamily()->location->area->name}}</td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @include('Include.Datatable.script')
@endsection