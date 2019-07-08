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
	                        <table>
	                            <thead>
	                                <tr>
	                                    <th>{{'Family Name'}}</th>
	                                    <th>{{'Title'}}</th>
	                                    <th>{{'Tribe'}}</th>
	                                    <th>{{'Location'}}</th>
	                                    <th>{{'Head E-mail'}}</th>
	                                    <th>{{'Head Phone'}}</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($district->families() as $family)
	                                    
	                                    <tr>
	                                        <td>{{$family->name}}</td>
	                                        <td>{{$family->title}}</td>
	                                        <td>{{$family->family->tribe->name}}</td>
	                                        <td>{{$family->location->town->name}}</td>
	                                        <td>{{$family->admin->profile->user->email}}</td>
	                                        <td>{{$family->admin->profile->user->phone}}</td>
	                                    </tr>
	                                   
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <!-- end modal -->