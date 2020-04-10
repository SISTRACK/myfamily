<!-- modal -->
<div class="modal fade" id="town{{$town->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h3>Edit Town/Village Info</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.state.lga.district.town.update',[
                    $district->lga->state->name,
                    $district->lga->name,
                    $district->name,
                    $district->id,
                    $town->id
                    ])}}" method="post">
                		@csrf
                        <div class="form-group">
                            <label>District</label>
                            <select name="district" class="form-control">
                                <option value="{{$town->district->id}}">{{$town->district->name}}</option>
                                @foreach($town->district->lga->districts as $district)
                                    @if($town->district->id != $district->id)
                                       <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Town/Village Name</label>
                            <input type="text" class="form-control" value="{{$town->name}}" name="name" />
                        </div>

                        <div class="form-group">
                            <label>Town/Village Code</label>
                            <input type="text" class="form-control" value="{{$town->code}}" name= "code"/>
                        </div>
                		<button class="btn btn-info">Update</button>
                	</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- end modal -->