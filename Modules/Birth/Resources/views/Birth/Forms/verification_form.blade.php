<form id="wizard-vertical" action="{{route('family.birth.family.verify',[profile()->thisProfileFamily()->name])}}" method="POST">
	@csrf
	
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="family">Choose Family</label>
			<div class="col-lg-8">
				<select name="family" class="form-control">
					<option value="">Chose Family</option>
					@foreach($families as $family)
                        <option value="{{$family->id}}">{{$family->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " ></label>
			<div class="col-lg-8">
				<input type="submit" value="Use Family" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
