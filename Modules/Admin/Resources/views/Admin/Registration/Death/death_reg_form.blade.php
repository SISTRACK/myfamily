<form id="wizard-vertical" action="{{route('district.family.death.register',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}" method="POST">
	@csrf
	<h3>Personal Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="first_name">First Name</label>
			<div class="col-lg-8">
				<select name="first_name" class="form-control">
					<option value="">First Name</option>
					@if(!empty($names))
						@foreach($names as $name)
	                        <option value="{{$name['user_id']}}">{{$name['first_name']}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="last_name">Last Name</label>
			<div class="col-lg-8">
				<select name="last_name" class="form-control">
					<option value="">Last name</option>
					@if(!empty($names))
						@foreach($names as $name)
	                        <option value="{{$name['user_id']}}">{{$name['last_name']}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
	</section>
	<h3>Death Info</h3>
	<section>	
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Dead At</label>
			<div class="col-lg-8">
				<select name="death_at" class="form-control">
					<option value=""></option>
	                <option value="Home">Home</option>
	                <option value="Hospital">Hospital</option>
	                <option value="Other Places">Other Places</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Date</label>
			<div class="col-lg-8">
				<input type="date" name="date" class="form-control">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">place</label>
			<div class="col-lg-8">
				<input type="text" name="place" class="form-control" placeholder="place of death">
			</div>
		</div>
	    </section>
		<h3>History</h3>
		<section>
			<div class="form-group clearfix">
				<label class="col-lg-4 control-label " for="husband_last_name">Brief history of the death</label>
				<div class="col-lg-8">
					<textarea name="about_death" class="form-control" cols="4" rows="6" placeholder="Brief description about the death"></textarea>
				</div>
			</div>
		
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name"></label>
			<div class="col-lg-8">
				<input type="submit" value="Register Death" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
