    <div class="modal fade" id="newDeath" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Select Family of the death person</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				<div class="modal-body">
					<form id="wizard-vertical" action="{{route('district.death.family.verify',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}" method="POST">
						@csrf
						<section>
							<div class="form-group clearfix">
								<label class="col-lg-4 control-label " for="husband_first_name">Choose Family title</label>
								<div class="col-lg-8">
									<select name="family" class="form-control">
										<option value=""></option>
										
										@foreach($district->families() as $family)
											<option value="{{$family->id}}">{{$family->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group clearfix">
								<label class="col-lg-4 control-label " for="husband_last_name">Who is the person in the family ? </label>
								<div class="col-lg-8">
									<select name="status" class="form-control">
										<option value=""></option>
										<option value="husband">Husband</option>
										<option value="wife">Wife</option>
										<option value="child">Child</option>
										<option value="inlaw">Inlaw</option>
										
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
					</div>
				</div>
			</div>
		</div>
	</div>
