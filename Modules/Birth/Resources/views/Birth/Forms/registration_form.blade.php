
<form id="wizard-vertical" action="birth/register" method="POST">
	@csrf
	<h3>Father Info</h3>
	<section>
		<div class="form-group clearfix">
			<input type="hidden" name="user_id" value="{{$father['user_id']}}">
			<label class="col-lg-4 control-label " for="father_first_name">Father First Name</label>
			<div class="col-lg-8">
				<input value="{{$father['name']}}" class="form-control required" id="userName1" name="father_first_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Father Last Name</label>
			<div class="col-lg-8">
				<input value="{{$father['surname']}}" value="{{old('father_last_name')}}" placeholder="Husband Last Name"  id="husband_last_name" name="father_last_name" type="text" class="required form-control" >
			</div>
		</div>
	</section>

	<h3>Mother Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="wife_first_name">Mother First Name</label>
			<div class="col-lg-8">
				<select name="mother_first_name" class= form-control>
					<option values="">Mother First Name</option>
					@foreach($mothers as $mother)
                        <option value="{{$mother['name'].'.'.$mother['user_id']}}">{{$mother['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label" for="wife_last_name">Mother last Name</label>
			<div class="col-lg-8">
				<select name="mother_last_name" class= form-control>
					<option values="">Mother Last Name</option>
					@foreach($mothers as $mother)
                        <option value="{{$mother['surname'].'.'.$mother['user_id']}}">{{$mother['surname']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Mother Status</label>
			<div class="col-lg-8">
				<select name="mother_status" class="form-control" value="{{old('wife_status')}}" >
					<option value=""></option>
					@if($status)
                        @foreach($status as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
					@endif
				</select>
			</div>
		</div>
	</section>
	<h3>Child Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child First Name</label>
			<div class="col-lg-8">
				<input class="form-control required" id="marriage_date" name="child_name" type="text" value="{{old('child_name')}}" placeholder="Child First Name">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child Gender</label>
			<div class="col-lg-8">
				<select class="form-control" name="gender">
					<option value="">Gender</option>
					<option value="1">Male</option>
					<option value="2">Female</option>
					<option value="3">Others</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child Health Status</label>
			<div class="col-lg-8">
				<select class="form-control" name="health_status">
					<option value="">Health Status</option>
					<option value="Normal">Normal</option>
					<option>Fever</option>
					<option>Stomac Ache</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child Weight</label>
			<div class="col-lg-8">
				<select class="form-control" name="weight">
					<option value="">Child Weight</option>
					<option value="1.0 kg">1.0 kg</option>
					<option value="1.1 kg">1.1 kg</option>
					<option value="1.2 kg">1.2 kg</option>
				</select>
			</div>
		</div>
	</section>
	<h3>Birth Info</h3>
	<section>
        <div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="town">Date Of Birth</label>
			<div class="col-lg-8">
				<input value="{{old('date')}}" class="form-control required" id="date" name="date" type="date">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">Place Of Birth</label>
			<div class="col-lg-8">
				<input value="{{old('place')}}"  placeholder="Place of birth" class="form-control required"  name="place" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="area">Deliver At</label>
			<div class="col-lg-8">
				<select class="form-control" name="deliver_at">
					<option value="">Deliver At</option>
					<option value="Home">Home</option>
					<option value="Hospital">Hospital</option>
					<option value="Other Places">Other Place</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">Midwifery First Name</label>
			<div class="col-lg-8">
				<input value="{{old('midwifery_name')}}"  placeholder="Midwifery First Name" class="form-control required"  name="midwifery_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="midwifery_surname">Midwifery Surname</label>
			<div class="col-lg-8">
				<input value="{{old('midwifery_surname')}}"  placeholder="Midwifery Surname" class="form-control required" id="midwifery_surname" name="midwifery_surname" type="text">
			</div>
		</div>
	</section>
	
	<h3>Be Notify</h3>
	<section>
		<div class="form-group clearfix">
			<div class="col-lg-12">
				<div class="checkbox checkbox-primary">
					<input id="checkbox-v" type="checkbox">
					<label for="checkbox-v"> I agree with the Terms and Conditions. </label>
					<input type="submit" value="Register" class="btn btn-primary">
				</div>
			</div>
		</div>
	</section>
</form>
