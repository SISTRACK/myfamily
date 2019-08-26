<!-- modal -->
<div class="modal fade" id="{{'doctor_'.$doctor->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">Edit Doctor</h2>
		        <form action="{{route('health.hospital.doctor.update',[$doctor->id])}}" method="post">
		        	@csrf
		        	<input type="text" name="profile_id" placeholder="Profile ID" class="form-control"><br>
		        	<label>State of Origin</label>
		            <select name="state_id" class="form-control">
		             	<option value="{{$doctor->state->id}}">{{$doctor->state->name}}</option>
		             	@foreach(doctor()->states() as $state)
		                @if($doctor->state->id != $state->id)
		                  <option value="{{$state->id}}">
		                  	{{$state->name}}
		                  </option>
		                @endif    
		             	@endforeach
		            </select><br>
		            <label>Gender</label>
		            <select name="gender_id" class="form-control">
		             	<option value="{{$doctor->gender->id}}">{{$doctor->gender->name}}</option>
		             	@foreach(doctor()->genders() as $gender)
		                @if($doctor->gender->id != $gender->id)
		                  <option value="{{$gender->id}}">
		                  	{{$gender->name}}
		                  </option>
		                @endif
		             	@endforeach
		            </select><br>
		            <label>Doctor Discpline</label>
		            <select name="discpline_id" class="form-control">
		             	<option value="{{$doctor->discpline->id}}">
		                {{$doctor->discpline->name}}
		              </option>
		             	@foreach(doctor()->discplines() as $discpline)
		                @if($doctor->discpline->id != $discpline->id)
		                  <option value="{{$discpline->id}}">
		                  	{{$discpline->name}}
		                  </option>
		                @endif
		             	@endforeach
		            </select><br>
		            <label>Hospital Department</label>
		            <select name="department_id" class="form-control">
		              <option value="{{$doctor->hospitalDepartment->id}}">{{$doctor->hospitalDepartment->name}}</option>
		              @foreach(doctor()->departments() as $department)
		                @if($doctor->hospitalDepartment->id != $department->id)
		                  <option value="{{$department->id}}">
		                    {{$department->name}}
		                  </option>
		                @endif
		              @endforeach
		            </select><br>
		            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $doctor->first_name }}" required placeholder="First Name">
		            @if ($errors->has('first_name'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('first_name') }}</strong>
		                </span>
		            @endif
		            <br>
		                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $doctor->last_name }}" required placeholder="Second Name">
		                @if ($errors->has('last_name'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('last_name') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="email" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $doctor->phone }}" required placeholder="Phone Number">
		                @if ($errors->has('phone'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('phone') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $doctor->email }}" required placeholder="E-Mail Address">
		                @if ($errors->has('email'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('email') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
		                @if ($errors->has('password'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('password') }}</strong>
		                    </span>
		                @endif
		            <br>
		            	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
		            <br>        
		            <button class="btn btn-primary">Save Changes</button>
		        </form>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
