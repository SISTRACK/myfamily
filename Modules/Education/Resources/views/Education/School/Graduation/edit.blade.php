<!-- modal -->
<div class="modal fade" id="{{'graduated_'.$graduate->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    <h2 class="text-primary">Edit Graduation</h2>
                     <form action="{{route('education.school.graduation.update',[date('Y'),$graduate->id])}}" method="post" enctype="multipart/form-data">
			        	@csrf
			        	<label>Father</label>
			        	<input type="text" disabled name="profile_id" value="{{$graduate->profile->child ? $graduate->profile->child->birth->father->husband->profile->user->first_name.' '.$graduate->profile->child->birth->father->husband->profile->user->last_name : 'not available'}}" class="form-control"><br>
                <label>Admission NO</label>
			        	<input type="text" disabled name="admission_no" value="{{$graduate->admission_no}}" class="form-control"><br>

			          <label>Year of Graduation</label>
                <select class="form-control" name="year">
                  <option value="{{$graduate->graduated->year}}">{{$graduate->graduated->year}}</option>
                  @foreach($graduate->expectedYearsToGraduate() as $year)
                    @if($graduate->graduated->year != $year)
                      <option value="{{$year}}">{{$year}}</option>
                    @endif  
                  @endforeach
                </select><br>
                
                <label>Class of Honor</label>
                <select class="form-control" name="class_honor">
                  <option value="{{$graduate->graduated->class_honor}}">{{$graduate->graduated->class_honor}}</option>
                  @foreach($class_honors as $class_honor)
                    @if($graduate->graduated->class_honor != $class_honor)
                      <option value="{{$class_honor}}">{{$class_honor}}</option>
                    @endif  
                  @endforeach
                </select><br>
                @if($graduate->school->schoolType == 'Secondary')
                    <label>Discpline</label>
                    <input type="text" value="{{old('discpline')}}" class="form-control" name="discpline" placeholder="Eg Sciences or Art"><br>
                @endif
                @if($graduate->graduated->certificate)
                <label>This Upload will delete existing one and upload another one</label>
                @else
                  <label>You can upload this certificate if you want</label>
                @endif
                <input type="file" value="{{old('certificate')}}" class="form-control" name="certificate"><br>
                <label>Graduation Status</label>
                <input type="checkBox" name="graduation_status" checked class="form-control"><br>
                <input type="hidden" name="graduation_id" value="{{$graduate->graduated->id}}" class="form-control"><br>
			          <button class="btn btn-primary">Save Changes</button>
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
