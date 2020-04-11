<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="country">Country</label>
			<div class="col-lg-8">
				<input value="{{$family_admin->address()['country']}}"  placeholder="Country" class="form-control required" id="country" name="country" type="text" >
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="state">State</label>
			<div class="col-lg-8">
			    <select name="state" class="form-control">
				    <option value="{{$family_admin->family->location->area->town->district->lga->state->id}}">{{$family_admin->address()['state']}}</option>
					@foreach($country->states as $state)
                        @if($state->name != $family_admin->address()['state'])
                            <option value="{{$state->id}}">{{$state->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="lga">Local Government</label>
			<div class="col-lg-8">
			    <select name="lga" class="form-control">
				    <option value="{{$family_admin->family->location->area->town->district->lga->id}}">{{$family_admin->family->location->area->town->district->lga->name}}</option>
					@foreach($family_admin->family->location->area->town->district->lga->state->lgas as $lga)
					    @if($lga->id != $family_admin->family->location->area->town->district->lga->id)
                            <option value="{{$lga->id}}">{{$lga->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
        <div class="form-group clearfix">
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="lga">District</label>
			<div class="col-lg-8">
			    <select name="district" class="form-control">
				<option value="{{$family_admin->family->location->area->town->district->id}}">{{$family_admin->family->location->area->town->district->name}}</option>
					@foreach($family_admin->family->location->area->town->district->lga->districts as $district)
					    @if($district->id != $family_admin->family->location->area->town->district->id)
                            <option value="{{$district->id}}">{{$district->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
        <div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="town">Town/Village</label>
			<div class="col-lg-8">
			    <select name="town" class="form-control">
				    <option value="{{$family_admin->family->location->area->town->id}}">{{$family_admin->family->location->area->town->name}}</option>
					@foreach($family_admin->family->location->area->town->district->towns as $town)
					    @if($town->id != $family_admin->family->location->area->town->id)
                            <option value="{{$town->id}}">{{$town->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="area">Area</label>
			<div class="col-lg-8">
			    <select name="area" class="form-control">
				    <option value="{{$family_admin->family->location->area->name}}">{{$family_admin->family->location->area->name}}</option>
					@foreach($family_admin->family->location->area->town->areas as $area)
					    @if($area->id != $family_admin->family->location->area->id)
                            <option value="{{$area->id}}">{{$area->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">House No</label>
			<div class="col-lg-8">
				<input value="{{$family_admin->address()['house_no']}}"  placeholder="House No" class="form-control required" id="house_no" name="house_no" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_desc">Description</label>
			<div class="col-lg-8">
				<input value="{{$family_admin->address()['house_description']}}"  placeholder="House Description" class="form-control required" id="house_desc" name="house_desc" type="text">
			</div>
		</div>