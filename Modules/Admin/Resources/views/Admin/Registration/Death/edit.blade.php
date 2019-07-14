@extends('admin::layouts.master')

@section('page-title')

{{ Breadcrumbs::render('home',$death) }}

@endsection

@section('page-content')
<form id="wizard-vertical" action="{{route('district.family.death.update',
[
    $death->profile->family->location->town->lga->state->name,
    $death->profile->family->location->town->lga->name,
    $death->profile->family->location->town->district->name,
    $death->profile->family->name,
    $death->id
])}}" method="POST">
	@csrf
	<h3>Personal Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="first_name">First Name</label>
			<div class="col-lg-8">
				<input type="text" name="first_name" value="{{$death->profile->user->first_name}}" class="form-control">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="last_name">Last Name</label>
			<div class="col-lg-8">
				<input type="text" name="last_name" value="{{$death->profile->user->last_name}}" class="form-control">
			</div>
		</div>
	</section>
	<h3>Death Info</h3>
	<section>	
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Dead At</label>
			<div class="col-lg-8">
				<input type="hidden" name="update" value="update">
				<select name="death_at" class="form-control">
					<option value="{{$death->death_at}}">{{$death->death_at}}</option>
	                <option value="Home">Home</option>
	                <option value="Hospital">Hospital</option>
	                <option value="Other Places">Other Places</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Date</label>
			<div class="col-lg-8">
				<input type="date" name="date" class="form-control" value="{{date('m/d//Y',$death->date)}}">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">place</label>
			<div class="col-lg-8">
				<input type="text" name="place" class="form-control" value="{{$death->place}}">
			</div>
		</div>
	    </section>
		<h3>History</h3>
		<section>
			<div class="form-group clearfix">
				<label class="col-lg-4 control-label " for="husband_last_name">Brief history of the death</label>
				<div class="col-lg-8">
					<textarea name="about_death" class="form-control" cols="4" rows="6" placeholder="Brief description about the death">{{$death->about_death}}</textarea>
				</div>
			</div>
		
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name"></label>
			<div class="col-lg-8">
				<input type="submit" value="Save Changes" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
@endsection