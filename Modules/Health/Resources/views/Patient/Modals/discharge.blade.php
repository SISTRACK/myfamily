
<!-- modal -->
<div class="modal fade" id="discharge_admission_{{$admission->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Discharge Patient</h2>
		        <form action="{{route('health.hospital.doctor.patient.discharge')}}" method="post">
		        	@csrf
		            <input type="hidden" name="admission_id" class="form-control" value="{{$admission->id}}"><br>
		            <select class="form-control" name="discharge_condition">
		            	<option value="">Discharge Condition</option>
		            	@foreach(doctor()->dischargeConditions() as $condition)
			            	<option value="{{$condition->id}}">
			            		{{$condition->name}}
			            	</option>
		            	@endforeach
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
