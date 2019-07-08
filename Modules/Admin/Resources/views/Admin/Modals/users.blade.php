<!-- modal -->
	        <div class="modal fade" id="users" role="dialog">
	            <div class="modal-dialog">
	              <!-- Modal content-->
	                <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal">&times;</button>
	                    </div>
	                    <div class="modal-body">
	                        <table>
	                            <thead>
	                                <tr>
	                                    <th>{{'First Name'}}</th>
	                                    <th>{{'Second Name'}}</th>
	                                    <th>{{'E-mail Address'}}</th>
	                                    <th>{{'Phone Number'}}</th>
	                                    <th>{{'Status'}}</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($district->users() as $user)
	                                    @if($user->id != Auth()->User()->id)
	                                    <tr>
	                                        <td>{{$user->first_name}}</td>
	                                        <td>{{$user->last_name}}</td>
	                                        <td>{{$user->email}}</td>
	                                        <td>{{$user->phone}}</td>
	                                        <td>{{$user->profile != null ? 'Family Member' : 'Just Sign Up'}}</td>
	                                    </tr>
	                                    @endif
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