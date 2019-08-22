<!-- modal -->
<div class="modal fade" id="{{'edit_report_'.$graduate->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if(count($graduate->schoolReports)>0)
    			    @foreach($graduate->schoolReports as $report)
    			        <h2 class="text-primary">{{$report->schoolReportType->name}}</h2>
                        <form enctype="multipart/form-data" action="{{route('education.school.report.update',[request()->route('year'),$report->id])}}" method="post">
                            @csrf
                        <input type="hidden" name="report_id" value="{{$report->id}}">
                            <select class="form-control" name="school_report_type_id">
                                <option value="{{$report->schoolReportType->id}}">{{$report->schoolReportType->name}}</option>
                                @if(!$graduate->graduated)
                                    @foreach(schoolAdmin()->school->schoolReportTypes() as $report_type)
                                        @if($report_type->id != $report->schoolReportType->id)
                                            <option value="{{$report_type->id}}">{{$report_type->name}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select><br>
                            <textarea class="form-control" name="about_report">{{$report->about_report}}</textarea><br>
                            @if(!$graduate->graduated)
                                <button class="btn btn-primary">Save Changes</button>
                            @endif
                        </form>
                        <a class="btn btn-warning" href="{{route('education.school.report.delete',[request()->route('year'),$report->id])}}">Delete Report</a>

                        @if(!$loop->last)
                        <br><hr>
                        @endif
                    @endforeach
                @else
                    <h2 class="text-primary">No Report Found for {{$graduate->profile->user->first_name.' '.$graduate->profile->user->last_name}}</h2>
                @endif    
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
