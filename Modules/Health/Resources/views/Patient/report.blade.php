
<!-- modal -->
<div class="modal fade" id="admit_patient" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Admit Patient</h2>   
		        <form action="{{route('health.doctor.patient.admit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Health Condition</label>
                    <select class="form-control" name="medical_condition_id">
                    	<option></option>
                    	@foreach(doctor()->medicalConditions() as $medicalCondition)
                            <option value="{{$medicalCondition->id}}">{{$medicalCondition->name}}</option>
                    	@endforeach
                    </select><br>
                    <label>Infection</label>
                    <select class="form-control" name="infection_id">
                    	<option></option>
                    	@foreach(doctor()->infections() as $infection)
                            <option value="{{$infection->id}}">{{$infection->name}}</option>
                    	@endforeach
                    </select><br>
                    <label>Treatment</label> 
                    <select class="form-control" name="treatment_id">
                    	<option></option>
                    	@foreach(doctor()->treatments() as $treatment)
                            <option value="{{$treatment->id}}">{{$treatment->name}}</option>
                    	@endforeach
                    </select><br>             
                    <input type="hidden" value="{{$profile->id}}" name="id">
                    <br>
                    <div class="form-actions" style="margin: 0;">
                        <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Give Admission </button>
                    </div>
                </form>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
