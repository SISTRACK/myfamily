<div class="modal fade" id="newBirth" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<form id="" action="{{route('family.birth.family.verify',[profile()->thisProfileFamily()->name])}}" method="POST">
					@csrf
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="family">Choose Family</label>
						<div class="col-lg-8">
							<select name="family" class="form-control">
								<option value="">Choose Family</option>
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
				</form>
			</div>
		</div>
	</div>
</div>
