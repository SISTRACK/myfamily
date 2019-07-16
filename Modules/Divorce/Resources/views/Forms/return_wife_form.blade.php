<form id="wizard-vertical" action="{{route('family.wife.divorce.return',[profile()->family->name])}}" method="POST">
	@csrf
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="first_name">Wife First Name</label>
			<div class="col-lg-8">
				<select name="first_name" class="form-control">
					<option value=""></option>
					@if($wives)
						@foreach($wives as $wife)
	                        <option value="{{$wife->profile->user->id}}">{{$wife->profile->user->first_name}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="last_name">Wife Last Name</label>
			<div class="col-lg-8">
				<select name="last_name" class="form-control">
					<option value=""></option>
					@if($wives)
						@foreach($wives as $wife)
	                        <option value="{{$wife->profile->user->id}}">{{$wife->profile->user->last_name}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="status">Wife Status</label>
			<div class="col-lg-8">
				<select name="status" class="form-control">
					<option value=""></option>
					@if($wives)
						@foreach($wives as $wife)
	                        <option value="{{$wife->status->id}}">{{$wife->status->name}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Return Date</label>
			<div class="col-lg-8">
				<input type="date" name="date" class="form-control">
			</div>
		</div>
		
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="divorce"></label>
			<div class="col-lg-8">
				<input type="submit" value="Return Wife" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
