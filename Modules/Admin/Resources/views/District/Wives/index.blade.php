@extends('admin::layouts.master')

@section('title')
   The mariage history list in {{$district->name}} District
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
                        <th>Marriage Date</th>
                        <th>Marriage Status</th>
                        <th>Children</th>
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
                        @if($family->familyAdmin->profile->husband && count($family->familyAdmin->profile->husband->marriages) > 0)
                            @foreach($family->familyAdmin->profile->husband->marriages as $marriage)
                            <tr>
                                <td>
                                    @if($marriage->wife->profile->image->id > 2)
                                        <img src="{{stirage_url($marriage->wife->profile->profilePicture())}}" width="35" height="35" />
                                    @else
                                        <img src="{{asset($marriage->wife->profile->profilePicture())}}" width="35" height="35" />
                                    @endif
                                </td>
                                <td>{{$marriage->wife->profile->user->first_name}} {{$marriage->wife->profile->user->last_name}}</td>
                                <td>{{$family->name}}</td>
                                <td>{{date('d/M/Y',$marriage->date)}}</td>
                                <td>{{$marriage->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                                <td>{{count($marriage->wife->profile->birth())}}</td>
                                <td>{{$family->tribe->name}}</td>
                                <td>{{$marriage->wife->profile->user->email}}</td>
                                <td>{{$marriage->wife->profile->user->phone}}</td>
                                <td>{{$family->location->area->town->name}}</td>
                                <td>{{$family->location->area->name}}</td>
                                <td>{{$family->created_at}}</td>
                                <td>{{$family->updated_at}}</td>
                            </tr>
                            @endforeach
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