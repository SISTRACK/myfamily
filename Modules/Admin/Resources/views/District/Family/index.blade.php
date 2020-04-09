@extends('admin::layouts.master')

@section('page-content')
    @if(empty($district->families()))
        <h3>{{'Families record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Members</th>
                        <th>Tribe</th>
                        <th>Town</th>
                        <th>Area</th>
                        <th>Head E-mail</th>
                        <th>Head Phone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->families() as $family)
                        
                        <tr>
                            <td>{{$family->name}}</td>
                            <td>{{$family->familyAdmin->profile->totalFamilyMembers()}}</td>
                            <td>{{$family->tribe->name}}</td>
                            <td>{{$family->location->area->town->name}}</td>
                            <td>{{$family->location->area->name}}</td>
                            <td>{{$family->familyAdmin->profile->user->email}}</td>
                            <td>{{$family->familyAdmin->profile->user->phone}}</td>
                            <td>
                                <a href="{{route('district.family.edit',[$district->lga->state->name,$district->lga->name,$district->name,$family->id])}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('district.family.delete',[$district->lga->state->name,$district->lga->name,$district->name,$family->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection