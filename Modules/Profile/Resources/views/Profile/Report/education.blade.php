<div class="p-t-10 tab-pane" id="education">
    @if(count($user->profile->admitteds) > 0)
    <h4 class="text-custom m-b-5 h3">Admissions</h4>
    <div class="row">
        @foreach($user->profile->admitteds as $admission)
        <div class="col-md-12">
            <i class="fa fa-pencil" style="font-size: 60px;"></i>
            <i class="text-custom m-b-5">Admitted to</i> {{$admission->school->name}} {{$admission->school->schoolType->name}}<br>
            <i class="text-custom m-b-5">Located At</i> {{$admission->school->schoolLocation->address}}<br>
            <i class="text-custom m-b-5">At Year of</i> {{$admission->year}}<hr>
        </div> 
        @endforeach
    </div>
    <h4 class="text-custom m-b-5 h3">Graduation</h4>
    <div class="row">
        @foreach($user->profile->admitteds as $admission)
        <div class="col-md-12">
            @if($admission->graduated)
            <i class="fa fa-graduation-cap" style="font-size: 60px;"></i>
            <i class="text-custom m-b-5">Graduated From</i> {{$admission->school->name}}<br>
            <i class="text-custom m-b-5">Education Level</i> 
            {{$admission->school->schoolType->name}}<br>
            <i class="text-custom m-b-5">At Year of</i> 
            {{$admission->graduated->year}}<br>
            <i class="text-custom m-b-5">Class Honored</i> 
            {{$admission->graduated->class_honor}}
            <h5 class="text-custom m-b-5">Certificate</h5>
            @if($admission->graduated->certificate)
            <a href="{{storage_url('Nfamily/Profile/Certificates/'.$admission->graduated->certificate)}}"><i class="fa fa-certificate" style="font-size: 60px;"></i>
            </a>
            @else
                <button data-toggle="modal" data-target="#graduation_{{$admission->graduated->id}}" class="btn btn-info">Upload Your Certificate</button>
                <!-- modal -->
                    <div class="modal fade" id="graduation_{{$admission->graduated->id}}" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @include('profile::Forms.Setting.new_certificate_form')
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end modal -->
            @endif
            </div><br><hr>
            @endif
        </div>
        @endforeach
    </div> <hr>
    <h4 class="text-custom m-b-5 h3">School Reports</h4>
    <div class="row">
        @foreach($user->profile->admitteds as $admission)
        <div class="col-md-12">
            @foreach($admission->schoolReports as $report)
            <i class="fa fa-book" style="font-size: 60px;"></i>
            <i class="text-custom m-b-5">{{$admission->school->name}} Report base on :</i>{{$report->schoolReportType->name}}<br>
            <i class="text-custom m-b-5">About Report :</i>{{$report->about_report}}<br>
            @endforeach
        </div>
        @endforeach
    </div>
    @else
        <div class="alert alert-danger">No admission report found in this profiel</div>
    @endif 
</div>