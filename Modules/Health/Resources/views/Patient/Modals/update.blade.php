
<!-- modal -->
<div class="modal fade" id="update_admission_{{$admission->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Update Patient Admission</h2>   
		        <form action="{{route('health.doctor.patient.admission.update',[$admission->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Health Condition</label>
                    <select class="form-control" name="medical_condition_id">
                    	<option value="{{$admission->diagnose->medicalCondition->id}}">{{$admission->diagnose->medicalCondition->name}}</option>
                    	@foreach(doctor()->medicalConditions() as $medicalCondition)
                    	    @if($admission->diagnose->medicalCondition->id != $medicalCondition->id)
                                <option value="{{$medicalCondition->id}}">{{$medicalCondition->name}}</option>
                            @endif
                    	@endforeach
                    </select><br>
                    <label>Infection</label>
                    <select class="form-control" name="infection_id">
                    	<option value="{{$admission->diagnose->treatment->id}}">{{$admission->diagnose->infection->name}}</option>
                    	@foreach(doctor()->infections() as $infection)
                    	    @if($admission->diagnose->infection->id != $infection->id)
                                <option value="{{$infection->id}}">{{$infection->name}}</option>
                            @endif
                    	@endforeach
                    </select><br>
                    <label>Treatment</label> 
                    <select class="form-control" name="treatment_id">
                    	<option value="{{$admission->diagnose->treatment->id}}">{{$admission->diagnose->treatment->name}}</option>
                    	@foreach(doctor()->treatments() as $treatment)
                    	    @if($admission->diagnose->treatment->id != $treatment->id)
                                <option value="{{$treatment->id}}">{{$treatment->name}}</option>
                            @endif
                    	@endforeach
                    </select><br>             
                    <input type="hidden" value="{{$profile->id}}" name="profile_id">
                    <br>
                    <div class="form-actions" style="margin: 0;">
                        <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Admission </button>
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
