@extends('admin::layouts.master')

@section('page-title')

{{'Edit Birth birth'}}

@endsection

@section('page-content')
<form id="wizard-vertical" action="{{route('district.family.birth.update',[
    $district->lga->state->name,$district->lga->name,$district->name,$birth->father->husband->profile->family->name,$birth->id
]
)}}" method="POST">
	@csrf
	<h3>Father Info</h3>
	<section>
		<div class="form-group clearfix">
			<input type="hidden" name="user_id" value="{{$birth->father->husband->profile->user->id}}">
			<input type="hidden" name="update" value="update">
			<label class="col-lg-4 control-label " for="father_first_name">Father First Name</label>
			<div class="col-lg-8">
				<input value="{{$birth->father->husband->profile->user->first_name}}" class="form-control required" id="userName1" name="father_first_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Father Last Name</label>
			<div class="col-lg-8">
				<input value="{{$birth->father->husband->profile->user->last_name}}" placeholder="Husband Last Name"  id="husband_last_name" name="father_last_name" type="text" class="required form-control" >
			</div>
		</div>
	</section>

	<h3>Mother Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="wife_first_name">Mother First Name</label>
			<div class="col-lg-8">
				<select name="mother_first_name" class= form-control>
					<option value="{{$birth->mother->wife->profile->user->email}}">{{$birth->mother->wife->profile->user->first_name}}</option>
					@foreach($birth->father->husband->marriages as $marriage)
					    @if($marriage->wife->profile->user->email != $birth->mother->wife->profile->user->email)
                        <option value="{{$marriage->wife->profile->user->email}}">{{$marriage->wife->profile->user->first_name}}</option>
                        @endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label" for="wife_last_name">Mother last Name</label>
			<div class="col-lg-8">
				<select name="mother_last_name" class= form-control>
					<option value="{{$birth->mother->wife->profile->user->email}}">{{$birth->mother->wife->profile->user->last_name}}</option>
					@foreach($birth->father->husband->marriages as $marriage)
					    @if($marriage->wife->profile->user->email != $birth->mother->wife->profile->user->email)
                            <option value="{{$marriage->wife->profile->user->email}}">{{$marriage->wife->profile->user->last_name}}</option>
                        @endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Mother Status</label>
			<div class="col-lg-8">
				<select name="mother_status" class="form-control" >
					<option value="{{$birth->mother->wife->status->id}}">{{$birth->mother->wife->status->name}}</option>
					
                        @foreach($birth->father->husband->marriages as $marriage)
                            @if($birth->mother->wife->status->id != $marriage->wife->status->id)
                                <option value="{{$marriage->wife->status->id}}">{{$marriage->wife->status->name}}</option>
                            @endif
                        @endforeach
					
				</select>
			</div>
		</div>
	</section>
	<h3>Child Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child First Name</label>
			<div class="col-lg-8">
				<input class="form-control required" id="marriage_date" name="child_name" type="text" value="{{$birth->child->profile->user->first_name}}" placeholder="Child First Name">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child Gender</label>
			<div class="col-lg-8">
				<select class="form-control" name="gender">
					<option value="{{$birth->child->profile->gender->id}}">{{$birth->child->profile->gender->name}}</option>
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
					<option value="{{$birth->child->profile->profileHealth->desease->name}}">{{$birth->child->profile->profileHealth->desease->name}}</option>
					<option value="Normal">Normal</option>
					<option value="Fever">Fever</option>
					<option value="Stomach Pain">Stomach Pain</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="child-name">Child Weight</label>
			<div class="col-lg-8">
				<select class="form-control" name="weight">
					<option value="{{$birth->weight}}">{{$birth->weight}}</option>
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
				<input value="{{date('m/d/Y',$birth->date)}}" class="form-control required" id="date" name="date" type="date">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">Place Of Birth</label>
			<div class="col-lg-8">
				<input value="{{$birth->place}}"  placeholder="Place of birth" class="form-control required"  name="place" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="area">Deliver At</label>
			<div class="col-lg-8">
				<select class="form-control" name="deliver_at">
					<option value="{{$birth->deliver_at}}">{{$birth->deliver_at}}</option>
					<option value="Home">Home</option>
					<option value="Hospital">Hospital</option>
					<option value="Other Places">Other Place</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">Midwifery First Name</label>
			<div class="col-lg-8">
				<input value="{{$birth->deliver->first_name}}"  placeholder="Midwifery First Name" class="form-control required"  name="midwifery_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="midwifery_surname">Midwifery Surname</label>
			<div class="col-lg-8">
				<input value="{{$birth->deliver->last_name}}"  placeholder="Midwifery Surname" class="form-control required" id="midwifery_surname" name="midwifery_surname" type="text">
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
					<input type="submit" value="Save Changes" class="btn btn-primary">
				</div>
			</div>
		</div>
	</section>
</form>
@endsection