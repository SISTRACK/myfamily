    <div class="modal fade" id="newMarriage" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Select Family to register marriage in</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
					<form action="{{route('district.marriage.family.verify',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}" method="POST">
						@csrf
						<div class="form-group clearfix">
							<label class="col-lg-4 control-label " for="husband_first_name">Family title</label>
							<div class="col-lg-8">
								<select name="family" class="form-control">
									<option value="">Choose Family</option>
									@foreach($district->families() as $family)
										<option value="{{$family->id}}">{{$family->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group clearfix">
							<label class="col-lg-4 control-label " for="husband_last_name">Who is to marry</label>
							<div class="col-lg-8">
								<select name="status" class="form-control">
									<option value="father">Father</option>
									<option value="son">Son</option>
									<option value="daughter">Doughter</option>
								</select>
							</div>
						</div>
						<div class="form-group clearfix">
							<label class="col-lg-4 control-label " for="husband_last_name"></label>
							<div class="col-lg-8">
								<input type="submit" value="Chosen" class="btn btn-primary btn-block">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
