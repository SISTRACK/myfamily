<!-- modal -->
    <div class="modal fade" id="new_district" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<form action="{{route('admin.lga.district.create',[admin()->state->name,$lga->name])}}" method="post">
                		@csrf
                        <input type="hidden" name="lga_id" value="{{$lga->id}}">
                		<input type="text" name="district" value="{{old('district')}}" placeholder="District Name" class="form-control"><br>
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