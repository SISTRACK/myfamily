@foreach($profile->hospitalAdmissions as $admission)
    <div class="col-xs-12">
        <i class="fa fa-pencil" style="font-size: 60px;"></i>
        <i class="text-custom m-b-5">Admitted to</i> {{$admission->doctor->hospital->name}} Hospital<br>
        <i class="text-custom m-b-5">Admitted At</i> {{$admission->created_at}}<br>
        <i class="text-custom m-b-5">Admitted By</i> {{$admission->doctor->first_name}} {{$admission->doctor->last_name}}<br><hr>

        <b class="text-custom m-b-5">Diagnose</b><br>
        <i class="text-custom m-b-5">Condition</i> {{$admission->diagnose->medicalCondition->name}}<br>
        <i class="text-custom m-b-5">Deases/Infection</i> {{$admission->diagnose->infection->name}}<br>
        @if(doctor())
        <i class="text-custom m-b-5">Treatment</i> {{$admission->diagnose->treatment->name}}<br>
        @endif
        @if(doctor() && doctor()->hospital->id == $admission->doctor->hospital->id)
            @if($admission->dischargeAdmission && $admission->dischargeAdmission->is_active == 1)
            <b class="text-custom m-b-5">Discharge</b><br>
            <i class="text-custom m-b-5">Discharge Condition</i> {{$admission->dischargeAdmission->dischargeCondition->name}}<br>
            <i class="text-custom m-b-5">Discharge By</i> {{$admission->dischargeAdmission->doctor->first_name}} {{$admission->dischargeAdmission->doctor->last_name}}<br>
                <a href="{{route('health.hospital.doctor.patient.admission.discharge.revisit',[$admission->dischargeAdmission->id])}}" class="btn btn-info">Revisit</a>
                <button class="btn btn-primary"data-toggle="modal" data-target="#admit_patient">Diagnose And Revisit</button><hr>
            @else
                <button data-toggle="modal" data-target="#discharge_admission_{{$admission->id}}" class="btn btn-info">Discharge</button>
                @include('health::Patient.Modals.discharge')
                @if($admission->doctor_id == doctor()->id)
                <button class="btn btn-danger"><a href="{{route('health.hospital.doctor.patient.admission.delete',[$admission->id])}}">Delete</a></button>
                
                <button data-toggle="modal" data-target="#update_admission_{{$admission->id}}" class="btn btn-success">Update</button>
                @include('health::Patient.Modals.update')
                @endif
            @endif
        @endif
        @if($admission->dischargeAdmission && $admission->dischargeAdmission->is_active == 1)
            <b class="text-custom m-b-5">Discharge</b><br>
            <i class="text-custom m-b-5">Discharge Condition</i> {{$admission->dischargeAdmission->dischargeCondition->name}}<br>
            <i class="text-custom m-b-5">Discharge By</i> {{$admission->dischargeAdmission->doctor->first_name}} {{$admission->dischargeAdmission->doctor->last_name}}<br>
        @endif
        @if($admission->dischargeAdmission && $admission->dischargeAdmission->dischargeRevisits)
            @foreach($admission->dischargeAdmission->dischargeRevisits as $revisit)
                <b class="text-custom m-b-5">Revisted Discharge</b><br>
                <i class="text-custom m-b-5">Revisited At</i> {{$revisit->created_at}}<br>
            @endforeach
        @endif
        @if($admission->medicalReport)
            <a href="{{storage_url('Nfamily/Profile/Report/Medical/'.$profile->id.'/'.$report->file)}}"><i class="fa fa-file-pdf-o" style="font-size: 60px;"></i>
        {{$report->created_at}}</a>
        @endif
        <hr>
    </div>
    <br>    
@endforeach