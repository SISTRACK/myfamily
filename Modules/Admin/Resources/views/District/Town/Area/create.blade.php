<!-- modal -->
<div class="modal fade" id="newArea" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.state.lga.district.town.area.register',[
                    $town->district->lga->state->name,
                    $town->district->lga->name,
                    $town->district->name,
                    $town->district->id,
                    $town->id
                    ])}}" method="post">
                		@csrf
                        <input type="hidden" name="town_id" value="{{$town->id}}">
                		<div class="form-group" id="area">
                            <input type="text" name="areas[]" class="form-control add-input" placeholder="Area Name" />
                            <a class="btn btn-danger" href="#" onclick='remove(this)'>
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="form-group" class="button-add">
                            <a class="btn btn-success" id="add_area">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                		<button class="btn btn-info">Register</button>
                	</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- end modal -->