
<!-- modal -->
<div class="modal fade" id="discharge" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Discharge Patient</h2>
		        <form action="{{route('health.doctor.patient.profile.verify')}}" method="post">
		        	@csrf
		            <input type="hidden" name="admission_id" class="form-control" value="{{$admission->id}}"><br>
		            <select class="form-control" name="condition">
		            	<option>Discharge Condition</option>
		            	<option value="1">Ask to be discharge</option>
		            	<option value="2">Decide to discharge</option>
		            </select><br>
		            <button class="btn btn-info">Discharge</button>
		        </form>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
