<!-- modal -->
<div class="modal fade" id="births" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<a class="btn btn-success" href="{{route('district.births.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Birth</a>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	@if(empty($district->births()))
                    <h3>{{'Births record not found in '.$district->name.' District'}}</h3>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{'Father'}}</th>
                            <th>{{'Mother'}}</th>
                            <th>{{'Child'}}</th>
                            <th>{{'Date Of Birth'}}</th>
                            <th>{{'Place Of Birth'}}</th>
                            <th>{{'Deliver At'}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($district->births() as $birth)
                            
                            <tr>
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
                                	{{date('d/M/Y',$birth->date)}}
                                </td>
                                <td>{{$birth->place}}</td>
                                <td>{{$birth->deliver_at}}</td>
                                <td>
                                    <a href="{{route('district.family.birth.edit',[$district->lga->state->name,$district->lga->name,$district->name,$birth->father->husband->profile->family->name,$birth->id])}}" class="btn btn-warning">Edit</a>
                              
                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->