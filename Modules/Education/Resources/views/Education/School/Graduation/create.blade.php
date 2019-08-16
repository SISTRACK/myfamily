<!-- modal -->
<div class="modal fade" id="{{'graduate_'.$graduate->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    <h2 class="text-primary">Edit Graduation</h2>
                     <form enctype="multipart/form-data" action="{{route('education.school.graduation.register',[date('Y')])}}" method="post">
			        	@csrf
                        <input type="hidden" name="admission_id" value="{{$graduate->id}}">
			        	<label>Father</label>
			        	<input type="text" disabled name="profile_id" value="{{$graduate->profile->child ? $graduate->profile->child->birth->father->husband->profile->user->first_name.' '.$graduate->profile->child->birth->father->husband->profile->user->last_name : 'not available'}}" class="form-control"><br>
                        <label>Admission NO</label>
			        	<input disabled type="text" name="admission_no" value="{{$graduate->admission_no}}" class="form-control"><br>
			            <label>Year of Admission</label>
                        <input type="text" disabled value="{{$graduate->year}}" class="form-control"><br>
                        <label>Year of Graduation</label>
                        <select class="form-control" name="year">
                        	<option value="">Year of Graduation</option>
                        	@foreach($graduate->expectedYearsToGraduate() as $year)
                                <option value="{{$year}}">{{$year}}</option>
                        	@endforeach
                        </select>
                        <br>
                        <label>Certificate if any</label>
                        <input type="file" value="{{old('file')}}" class="form-control" name="certificate"><br>
                        @if($graduate->school->schoolType == 'Secondary')
                        <label>Discpline</label>
                        <input type="text" value="{{old('discpline')}}" class="form-control" name="discpline" placeholder="Eg Sciences or Art"><br>
                        @endif
                        <select class="form-control" name="class_honor">
                            <option value="">Class Honor</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Very Good">Very Good</option>
                            <option value="Good">Good</option>
                            <option value="Satisfactory">Satisfactory</option>
                            <option value="Poor">Poor</option>
                        </select><br>
			          <button class="btn btn-primary">Graduate</button>
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
