<form id="wizard-vertical" action="marriage/verify" method="POST">
	@csrf
	
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Family title</label>
			<div class="col-lg-8">
				<select name="family" class="form-control">
					<option value=""></option>
					@foreach($families as $family)
                        <option value="{{$family->id}}">{{$family->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Who dead ? </label>
			<div class="col-lg-8">
				<select name="status" class="form-control">
					<option value=""></option>
					<option value="father">Husband</option>
					<option value="son">Wife</option>
					<option value="son">Child</option>
					<option value="son">Inlaw</option>
					
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name"></label>
			<div class="col-lg-8">
				<input type="submit" value="Chosen" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
