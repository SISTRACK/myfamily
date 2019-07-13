<!-- modal -->
<div class="modal fade" id="deaths" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<a class="btn btn-success" href="{{route('district.births.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Death</a>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	@if(empty($district->deaths()))
                    <h3>{{'Deaths record not found in '.$district->name.' District'}}</h3>
                @else
                <div class="row">
                	<div class="col-xs-12">
                		<table class="table">
		                    <thead>
		                        <tr>
		                            <th>{{'Name'}}</th>
		                            <th>{{'Family'}}</th>
		                            <th>{{'Town'}}</th>
		                            <th>{{'Date'}}</th>
		                            <th>{{'Place'}}</th>
		                            <th>{{'Wives'}}</th>
		                            <th>{{'Children'}}</th>
		                            <th></th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($district->deaths() as $death)
		                            
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
                	</div>
                </div>
                
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->