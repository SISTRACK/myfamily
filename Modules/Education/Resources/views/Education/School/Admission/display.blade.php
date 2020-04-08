<!-- modal -->
<div class="modal fade" id="user_{{$profile->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        @if($profile->image->id > 2)
                        <img src="{{storage_url($profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                        @else
                        <img src="{{asset($profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                        @endif
                    </div>
                    <div class="col-sm-8">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td> {{$profile->user->first_name.' '.$profile->user->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$profile->user->email}}</td>
                            </tr>
                            <tr>
                                <td width="150">Phone</td>
                                <td>{{$profile->user->phone}}</td>
                            </tr>
                            <tr>
                                <td width="150">Gender</td>
                                <td>{{$profile->gender->name}}</td>
                            </tr>
                            <tr>
                                <td width="150">Marrital Status</td>
                                <td>{{$profile->maritalStatus->name}}</td>
                            </tr>
                            <tr>
                                <td>Birth</td>
                                <td>{{count($profile->numberOfBirths())}}</td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td>{{date('D:M:Y',$profile->date_of_birth)}}</td>
                            </tr>
                            
                            <tr>
                                <td>Family</td>
                                <td>{{$profile->thisProfileFamily()->name}}</td>
                            </tr>
                            
                            
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