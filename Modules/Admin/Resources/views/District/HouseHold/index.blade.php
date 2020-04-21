@extends('admin::layouts.master')

@section('title')
   The list of House Hold in {{$district->name}} District
@endsection
 
@section('header')
    @include('Include.Datatable.style')
@endsection

@section('page-content')
    @if(empty($district->families()))
        <h3>{{'Families record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered" id="datatable-buttons">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Family</th>
                        <th>Children</th>
                        <th>Wives</th>
                        <th>Tribe</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Town</th>
                        <th>Area</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->families() as $family)
                        
                        <tr>
                            <td>
                                @if($family->familyAdmin->profile->image->id > 2)
                                    <img src="{{stirage_url($family->familyAdmin->profile->profilePicture())}}" width="35" height="35" />
                                @else
                                    <img src="{{asset($family->familyAdmin->profile->profilePicture())}}" width="35" height="35" />
                                @endif
                            </td>
                            <td>{{$family->familyAdmin->profile->user->first_name}} {{$family->familyAdmin->profile->user->last_name}}</td>
                            <td>{{$family->name}}</td>
                            <td>{{count($family->familyAdmin->profile->birth())}}</td>
                            <td>{{count($family->familyAdmin->profile->wives())}}</td>
                            <td>{{$family->tribe->name}}</td>
                            <td>{{$family->familyAdmin->profile->user->email}}</td>
                            <td>{{$family->familyAdmin->profile->user->phone}}</td>
                            <td>{{$family->location->area->town->name}}</td>
                            <td>{{$family->location->area->name}}</td>
                            <td>{{$family->created_at}}</td>
                            <td>{{$family->updated_at}}</td>
                            
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