@extends('admin::layouts.master')

@section('page-content')

    @if(empty($district->families()))
        <h3>{{'Towns record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Areas</th>
                        <th>Code</th>
                        <th>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#newTown">New Town</a>
                        @include('admin::District.Town.create')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district->towns as $town)
                        
                        <tr>
                            <td>{{$town->name}}</td>
                            <td>
                                <a href="{{route('admin.state.lga.district.town.areas.index',[
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
                                <a href="#" data-toggle="modal" data-target="#town{{$town->id}}" class="btn btn-warning">Edit</a>
                                @include('admin::District.Town.edit')
                                <a href="{{route('admin.state.lga.district.town.delete',[
                                    $district->lga->state->name,
			                    	$district->lga->name,
			                    	$district->name,
			                    	$district->id,
			                    	$town->id
			                    	])}}" onclick="return confirm('Are you sure you want delete this town ?')" class="btn btn-danger">Delete</a>
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
    <script type="text/javascript">
        function remove(current){
            current.parentNode.remove()
        }
        document.getElementById("add_town").onclick = function() {
            var e = document.createElement('div');
            e.innerHTML = "<input type='text' name='towns[]' class='form-control add-input' placeholder='Town/Village Name' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("town").appendChild(e);
        }
    </script>
@endsection