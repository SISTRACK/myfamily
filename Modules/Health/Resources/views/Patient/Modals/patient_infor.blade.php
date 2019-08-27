
<!-- modal -->
<div class="modal fade" id="patient_infor_{{$admission->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Home Address</h2>
			    <table>
			    	<tr>
			    		<td class="text-primary">Country</td>
			    		<td>{{$admission->profile->address()['country']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">State</td>
			    		<td >{{$admission->profile->address()['state']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">Local Government</td>
			    		<td>{{$admission->profile->address()['lga']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">District</td>
			    		<td>{{$admission->profile->address()['district']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">Town</td>
			    		<td>{{$admission->profile->address()['town']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">Area</td>
			    		<td>{{$admission->profile->address()['area']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">House No</td>
			    		<td>{{$admission->profile->address()['house_no']}}</td>
			    	</tr>
			    	<tr>
			    		<td class="text-primary">House Description</td>
			    		<td>{{$admission->profile->address()['house_description']}}</td>
			    	</tr>
			    </table>  	
			     
			    <h2 class="text-primary">Contact</h2>
			    <table> 
				    <tr>
				    	<td class="text-primary">E-mail</td>
				    	<td>{{$admission->profile->user->email}}</td>
				    </tr>
				    <tr>
				    	<td class="text-primary">Phone</td>
				    	<td>{{$admission->profile->user->phone}}</td>
				    </tr>
				</table>
			    <h2 class="text-primary">Medication</h2>
                 @if($admission->dischargeAdmission && $admission->dischargeAdmission->is_active == 1)
	            <hr>
	            <b class="text-custom m-b-5">Discharge</b><br>
	            <i class="text-custom m-b-5">Discharge Condition</i> {{$admission->dischargeAdmission->dischargeCondition->name}}<br>
	            <i class="text-custom m-b-5">Discharge By</i> {{$admission->dischargeAdmission->doctor->first_name}} {{$admission->dischargeAdmission->doctor->last_name}}<br>
	                <a href="{{route('health.hospital.doctor.patient.admission.discharge.revisit',[$admission->dischargeAdmission->id])}}" class="btn btn-info">Revisit</a>
	                <button class="btn btn-primary"data-toggle="modal" data-target="#admit_patient">Diagnose And Revisit</button>
	            @else
	                <button data-toggle="modal" data-target="#discharge_admission_{{$admission->id}}" class="btn btn-info">Discharge</button>
	                @include('health::Patient.Modals.discharge')
	                
	                <button class="btn btn-danger"><a href="{{route('health.hospital.doctor.patient.admission.delete',[$admission->id])}}">Delete</a></button>
	                
	                <button data-toggle="modal" data-target="#update_admission_{{$admission->id}}" class="btn btn-success">Update</button>
	                @include('health::Patient.Modals.update')
	                
	            @endif
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
