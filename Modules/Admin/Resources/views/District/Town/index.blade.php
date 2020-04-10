@extends('admin::layouts.master')

@section('page-content')
    @if(empty($district->families()))
        <h3>{{'Towns record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Areas</th>
                        <th>Code</th>
                        <th><a class="btn btn-success" href="#">New Town</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->towns as $town)
                        
                        <tr>
                            <td>{{$town->name}}</td>
                            <td>
                                <a href="{{route('admin.state.lga.district.town.areas.index'[
                                    $district->lga->state->name,
			                    	$district->lga->name,
			                    	$district->name,
			                    	$district->id,
			                    	$town->id
			                    	])}}">
                            	{{count($town->areas)}}
                            	</a>
                            </td>
                            <td>{{$town->code}}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection