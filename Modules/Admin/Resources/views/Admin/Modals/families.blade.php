<!-- modal -->
	        <div class="modal fade" id="families" role="dialog">
	            <div class="modal-dialog">
	              <!-- Modal content-->
	                <div class="modal-content">
	                    <div class="modal-header">
	                    	<a class="btn btn-success" href="{{route('district.family.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Family</a>
	                      <button type="button" class="close" data-dismiss="modal">&times;</button>
	                    </div>
	                    <div class="modal-body">
	                    	@if(empty($district->families()))
                                <h3>{{'Families record not found in '.$district->name.' District'}}</h3>
	                        @else
	                        <table class="table">
	                            <thead>
	                                <tr>
	                                    <th>{{'Family Name'}}</th>
	                                    <th>{{'Title'}}</th>
	                                    <th>{{'Tribe'}}</th>
	                                    <th>{{'Location'}}</th>
	                                    <th>{{'Head E-mail'}}</th>
	                                    <th>{{'Head Phone'}}</th>
	                                    <th></th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($district->families() as $family)
	                                    
	                                    <tr>
	                                        <td>{{$family->name}}</td>
	                                        <td>{{$family->title}}</td>
	                                        <td>{{$family->tribe->name}}</td>
	                                        <td>{{$family->location->town->name}}</td>
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
	                        @endif
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <!-- end modal -->