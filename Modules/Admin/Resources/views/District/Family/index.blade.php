@extends('admin::layouts.master')

@section('title')
   {{$district->name}} District registered families
@endsection
 
@section('header')
    @include('Include.Datatable.style')
@endsection

@section('page-content')
    @if(empty($district->families()))
        <h3>{{'Families record not found in '.$district->name.' District'}}
            <a class="btn btn-primary" href="{{route('district.family.create',
                [
                $district->lga->state->name,
                $district->lga->name,
                $district->name,
                $district->id
                ])}}">
                Create One
            </a>
        </h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table-striped table-bordered" id="datatable-buttons">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Members</th>
                        <th>Tribe</th>
                        <th>Town</th>
                        <th>Area</th>
                        <th>Head E-mail</th>
                        <th>Head Phone</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th><a class="btn btn-success" href="{{route('district.family.create',
	                    	[
	                    	$district->lga->state->name,
	                    	$district->lga->name,
	                    	$district->name,
	                    	$district->id
	                    	])}}">New Family</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->families() as $family)
                        @if($family->familyAdmin)
                        <tr>
                            <td>{{$family->name}}</td>
                            <td>
                                {{count($family->familyAdmin->profile->totalFamilyMembers())}}
                            </td>
                            <td>{{$family->tribe->name}}</td>
                            <td>{{$family->location->area->town->name}}</td>
                            <td>{{$family->location->area->name}}</td>
                            <td>{{$family->familyAdmin->profile->user->email}}</td>
                            <td>{{$family->familyAdmin->profile->user->phone}}</td>
                            <td>{{$family->created_at}}</td>
                            <td>{{$family->updated_at}}</td>
                            <td>
                                <a href="{{route('district.family.edit',[$district->lga->state->name,$district->lga->name,$district->name,$family->id])}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('district.family.delete',[$district->lga->state->name,$district->lga->name,$district->name,$family->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                       @endif
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