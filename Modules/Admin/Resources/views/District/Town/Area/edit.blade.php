<!-- modal -->
<div class="modal fade" id="area{{$area->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h3>Edit Area Info</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.state.lga.district.town.area.update',[
                    $area->town->district->lga->state->name,
                    $area->town->district->lga->name,
                    $area->town->district->name,
                    $area->town->district->id,
                    $area->town->name,
                    $area->id,
                    ])}}" method="post">
                		@csrf
                        <div class="form-group">
                            <label>Town/Village</label>
                            <select name="town_id" class="form-control">
                                <option value="{{$area->town->id}}">{{$area->town->name}}</option>
                                @foreach($area->town->district->towns as $town)
                                    @if($area->town->id != $town->id)
                                       <option value="{{$town->id}}">{{$town->name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Area Name</label>
                            <input type="text" class="form-control" value="{{$area->name}}" name="name" />
                        </div>

                        <div class="form-group">
                            <label>Area Code</label>
                            <input type="text" class="form-control" value="{{$area->code}}" name= "code"/>
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