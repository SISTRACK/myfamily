

<div class="tab-pane" id="admit_patient">   
  <h2 class="text-primary">Admit Patient</h2>   
  <form action="{{route('health.hospital.doctor.patient.admit')}}" method="post" enctype="multipart/form-data">
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
      <input type="hidden" value="{{$profile->id}}" name="profile_id">
      <br>
      <div class="form-actions" style="margin: 0;">
          <button name="submit" type="submit" class="btn btn-info btn-block"> Admit Patient </button>
      </div>
  </form>	
</div>

