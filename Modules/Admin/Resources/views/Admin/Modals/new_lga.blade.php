<!-- modal -->
    <div class="modal fade" id="new_lga" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.lga.create',[admin()->state->name])}}" method="post">
                		@csrf
                	
		                <div class="form-group" id="lga">
		                    
			                <input type="text" name="lgas[0]" class="form-control add-input" placeholder="Local Government Name" />
			                <a class="btn btn-danger" href="#" onclick='remove(this)'>
			                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
			                </a>
		                        
		                </div>
                
		                <div class="form-group" class="button-add">
		                    <a class="btn btn-success" id="add_lga">
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