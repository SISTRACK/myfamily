<div class="tab-pane" id="security">
@if(count($profile->securityReports) > 0)
    @foreach($profile->securityReports as $report)
        <div class="col-xs-12">
            <i class="fa fa-pencil" style="font-size: 60px;"></i>
            <i class="text-custom m-b-5">Reported At</i> {{$report->create_at}}<br>
            <i class="text-custom m-b-5">Reported By</i> {{$report->security->first_name}} {{$report->security->last_name}}<br><hr>
            <i class="text-custom m-b-5">Station</i> 
            @if($report->security->policeStation)
                $report->security->policeStation->name,
            @else
                $report->security->court->name,
            @endif
            <br><hr>

            <b class="text-custom m-b-5">About Report</b><textarea>{{$report->about}}</textarea><br>
            <i class="text-custom m-b-5">Evidence</i> {{$report->evidence}}<br>
        </div>
    @endforeach
@else
    <div class="alert alert-danger">No security report found for this profile</div>
@endif
</div>