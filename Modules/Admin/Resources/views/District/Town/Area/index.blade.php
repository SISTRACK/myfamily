@extends('admin::layouts.master')

@section('page-content')
    
    <div class="row">
        <div class="col-xs-12">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Town</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th> Number of Families</th>
                        <th>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#newArea">New Area</a>
                        @include('admin::District.Town.Area.create')
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                @if(count($town->areas) == 0)
                    <h3>{{'Areas record not found in '.$town->name.' Town'}}</h3>
                @else
                    @foreach($town->areas as $area)
                        <tr>
                            <td>{{$area->town->name}}</td>
                            <td>{{$area->name}}</td>
                            <td>{{$area->code}}</td>
                            <td>{{count($area->locations)}}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#area{{$area->id}}" class="btn btn-warning">Edit</a>
                                @include('admin::District.Town.Area.edit')
                                <a href="{{route('admin.state.lga.district.town.area.delete',[
                                            $area->town->district->lga->state->name,
                                            $area->town->district->lga->name,
                                            $area->town->district->name,
                                            $area->town->district->id,
                                            $area->town->name,
                                            $area->id,
                                            ])}}" class="btn btn-danger"  onclick="return confirm('Are you sure you want delete this area ?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('footer')
    <script type="text/javascript">
        function remove(current){
            current.parentNode.remove()
        }
        document.getElementById("add_area").onclick = function() {
            var e = document.createElement('div');
            e.innerHTML = "<input type='text' name='areas[]' class='form-control add-input' placeholder='Area Name' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("area").appendChild(e);
        }
    </script>
@endsection