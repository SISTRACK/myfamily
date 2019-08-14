<!-- modal -->
<div class="modal fade" id="{{'teacher_'.$teacher->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			         <h2 class="text-primary">New School User Agent</h2>
        <form action="{{route('admin.education.school.teacher.update',[$teacher->id])}}" method="post">
        	@csrf
        	<input type="hidden" name="school_id" value="{{$school->id}}">
        	<input type="text" name="profile_id" placeholder="Profile ID" class="form-control"><br>
            <select name="state_id" class="form-control">
             	<option value="{{$teacher->state->id}}">{{$teacher->state->name}}</option>
             	@foreach($states as $state)
                    @if($teacher->state->id != $state->id)
                        <option value="{{$state->id}}">
                        	{{$state->name}}
                        </option>
                    @endif
             	@endforeach
            </select><br>
            <input type="hidden" name="edit" value="edit">
            <select name="gender_id" class="form-control">
             	<option value="{{$teacher->gender->id}}">{{$teacher->gender->name}}</option>
             	@foreach($genders as $gender)
                    @if($teacher->gender->id != $gender->id)
                        <option value="{{$gender->id}}">
                        	{{$gender->name}}
                        </option>
                    @endif
             	@endforeach
            </select><br>
            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $teacher->first_name }}" required >
            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            <br>
                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $teacher->last_name }}" required>
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
           <br>
                <input id="email" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $teacher->phone }}" required placeholder="Phone Number">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
           <br>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $teacher->email }}" required placeholder="E-Mail Address">
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
			    <div class="col-md-4"></div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
