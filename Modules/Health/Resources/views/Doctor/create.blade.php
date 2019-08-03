@extends('admin::layouts.master')

@section('page-content')
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New Hospital</h2>
        <form action="{{route('admin.health.hospital.register')}}" method="post">
        	@csrf
                <input type="text" name="name" class="form-control" placeholder ="Hospital Title"><br>
                <select name="hospital_id" class="form-control">
	             	<option value="">Hospital</option>
	             	@foreach($hospitals as $hospital)
	                    <option value="{{$hospital->id}}">
	                    	{{$hospital->name}}
	                    </option>
	             	@endforeach
	            </select><br>
             <select name="gender_id" class="form-control">
             	<option value="">Gender</option>
             </select><br>
             <select name="discpline_id" class="form-control">
             	<option value="">Discpline</option>
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
            <button class="btn btn-primary">Register Doctor</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection