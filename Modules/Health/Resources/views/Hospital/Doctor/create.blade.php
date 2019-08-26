<!-- modal -->
<div class="modal fade" id="new_doctor" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			         <h2 class="text-primary">New Doctor</h2>
		        <form action="{{route('health.hospital.doctor.register')}}" method="post">
		        	@csrf
		        	<input type="hidden" name="hospital_id" value="{{doctor()->hospital->id}}">
		        	<input type="text" name="profile_id" placeholder="Profile ID" class="form-control"><br>
		            <select name="state_id" class="form-control">
		             	<option value="">State of Origin</option>
		             	@foreach(doctor()->states() as $state)
		                    <option value="{{$state->id}}">
		                    	{{$state->name}}
		                    </option>
		             	@endforeach
		            </select><br>
		            
		            <select name="gender_id" class="form-control">
		             	<option value="">Gender</option>
		             	@foreach(doctor()->genders() as $gender)
		                    <option value="{{$gender->id}}">
		                    	{{$gender->name}}
		                    </option>
		             	@endforeach
		            </select><br>
		            <select name="department_id" class="form-control">
		             	<option value="">Departments</option>
		             	@foreach(doctor()->departments() as $department)
		                    <option value="{{$department->id}}">
		                    	{{$department->name}}
		                    </option>
		             	@endforeach
		            </select><br>
		            <select name="discpline_id" class="form-control">
		             	<option value="">Discpline</option>
		             	@foreach(doctor()->discplines() as $discpline)
		                    <option value="{{$discpline->id}}">
		                    	{{$discpline->name}}
		                    </option>
		             	@endforeach
		            </select><br>
		            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name">
		            @if ($errors->has('first_name'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('first_name') }}</strong>
		                </span>
		            @endif
		            <br>
		                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required placeholder="Second Name">
		                @if ($errors->has('last_name'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('last_name') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="email" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
		                @if ($errors->has('phone'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('phone') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">
		                @if ($errors->has('email'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('email') }}</strong>
		                    </span>
		                @endif
		           <br>
		                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
		                @if ($errors->has('password'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('password') }}</strong>
		                    </span>
		                @endif
		            <br>
		            	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
		            <br>        
		            <button class="btn btn-primary">Register</button>
		         </form>
			    </div>
			    <div class="col-md-4"></div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
