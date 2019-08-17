<!-- modal -->
<div class="modal fade" id="{{'admission_'.$admission->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    <h2 class="text-primary">Edit Admission</h2>
              <form action="{{route('education.school.admission.update',[date('Y'),$admission->id])}}" method="post">
			        	@csrf
			        	<label>Profile ID</label>
			        	<input type="text" name="profile_id" value="{{$admission->profile_id}}" class="form-control"><br>
                <label>Admission NO</label>
			        	<input type="text" name="admission_no" value="{{$admission->admission_no}}" class="form-control"><br>
                <label>Admitted At</label>
			          <select class="form-control" name="year">
                <option value="{{$admission->year}}">{{$admission->year}}</option>
                  @foreach($years as $year)
                    @if($admission->year != $year)
                      <option value="{{$year}}">{{$year}}</option>
                    @endif  
                  @endforeach
                </select><br>
                @if($admission->graduated)
                  <label>Graduated At</label>
                  <input type="text" name="" value="{{$admission->graduated->year}}" class="form-control"> <br>
                @endif
                  @if(!$admission->graduated)
			            <button class="btn btn-primary">Save Changes</button>
                  @endif
			         </form>
			    </div>
			    <div class="col-md-4"></div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
