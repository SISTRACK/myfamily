<!-- modal -->
<div class="modal fade" id="newTown" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.lga.district.town.create',[$district->lga->state->name,$district->lga->name,$district->name])}}" method="post">
                		@csrf
                        <input type="hidden" name="district_id" value="{{$district->id}}">
                		<div class="form-group" id="town">
                            
                            <input type="text" name="towns[]" class="form-control add-input" placeholder="Town/Village Name" />
                            <a class="btn btn-danger" href="#" onclick='remove(this)'>
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                     
                        </div>
                        <div class="form-group" class="button-add">
                            <a class="btn btn-success" id="add_town">
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