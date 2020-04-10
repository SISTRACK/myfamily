<!-- modal -->
	        <div class="modal fade" id="marriages" role="dialog">
	            <div class="modal-dialog">
	              <!-- Modal content-->
	                <div class="modal-content">
	                    <div class="modal-header">
	                    	<a class="btn btn-success" href="{{route('district.marriages.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Marriage</a>
	                      <button type="button" class="close" data-dismiss="modal">&times;</button>
	                    </div>
	                    <div class="modal-body">
	                    	
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <!-- end modal -->