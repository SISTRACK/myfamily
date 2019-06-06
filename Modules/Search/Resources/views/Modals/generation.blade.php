<!-- modal -->
<div class="modal fade" id="{{$data['profile']->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="assets/images/users/{{$data['profile']->image->name}}" alt="photo" width="150" class="innerB half">
                    </div>
                    <div class="col-sm-8">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td> {{$data['profile']->user->first_name.' '.$data['profile']->user->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$data['profile']->user->email}}</td>
                            </tr>
                            <tr>
                                <td width="150">Marrital Status</td>
                                <td>{{$data['profile']->maritalStatus->name}}</td>
                            </tr>
                            <tr>
                                <td>Birth</td>
                                <td>{{count($data['profile']->numberOfBirths())}}</td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td>{{date('D:M:Y',$data['profile']->date_of_birth)}}</td>
                            </tr>
                            @if($data['profile']->wife != null)
	                            @foreach($data['profile']->wife->marriages as $marriage)
	                                @if($marriage->is_active == 1)
		                            <tr>
		                                <td>Family</td>
		                                <td>{{$marriage->husband->profile->family->name}}</td>
		                            </tr>
		                            @endif
	                            @endforeach
                            @else
                            <tr>
                                <td>Family</td>
                                <td>{{$data['profile']->family->name}}</td>
                            </tr>
                            @endif
                            @if($data['profile']->husband != null)
                            <tr>
                                <td>Number Of wives</td>
                                <td>{{count($data['profile']->numberOfWives())}}</td>
                            </tr>
                            
                            @endif
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->