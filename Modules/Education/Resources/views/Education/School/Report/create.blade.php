<!-- modal -->
<div class="modal fade" id="{{'report_'.$graduate->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    <h2 class="text-primary">New Report</h2>
                     <form enctype="multipart/form-data" action="{{route('education.school.report.register',[date('Y')])}}" method="post">
			        	@csrf
                        <input type="hidden" name="admission_id" value="{{$graduate->id}}">
			        	<label>Father</label>
			        	<input type="text" disabled name="profile_id" value="{{$graduate->profile->child ? $graduate->profile->child->birth->father->husband->profile->user->first_name.' '.$graduate->profile->child->birth->father->husband->profile->user->last_name : 'not available'}}" class="form-control"><br>
                        <label>Admission NO</label>
			        	<input disabled type="text" name="admission_no" value="{{$graduate->admission_no}}" class="form-control"><br>
			            <label>Year of Admission</label>
                        <input type="text" disabled value="{{$graduate->year}}" class="form-control"><br>
                        <label>Report Type</label>
                        <select class="form-control" name="report_type_id">
                        	<option value="">Report</option>
                        	@foreach(schoolAdmin()->school->schoolReportTypes() as $report)
                                <option value="{{$report->id}}">{{$report->name}}</option>
                        	@endforeach
                        </select>
                        <br>
                        <label>About Report</label>
                        <textarea class="form-control" name="about_report" placeholder="Please write some thing understandable about the report in brief"></textarea><br>
			          <button class="btn btn-primary">Report</button>
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
