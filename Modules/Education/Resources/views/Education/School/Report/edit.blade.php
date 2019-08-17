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
