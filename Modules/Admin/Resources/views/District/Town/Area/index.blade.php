@extends('admin::layouts.master')

@section('page-content')
    @if(empty($district->families()))
        <h3>{{'Areas record not found in '.$town->name.' Town'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th><a class="btn btn-success" href="#">New Area</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($town->areas as $area)
                        
                        <tr>
                            <td>{{$area->name}}</td>
                            <td>{{$area->code}}</td>
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