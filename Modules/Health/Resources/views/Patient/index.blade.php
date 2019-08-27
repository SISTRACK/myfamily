@extends('health::layouts.master')

@section('page-content')
	<button class="btn btn-info"><a href="#" data-toggle="modal" data-target="#verify_patient" style="color: white"><i class="fa fa-plus"></i></a></button>
	@include('health::Patient.verify')
	@foreach(doctor()->hospitalAdmissions as $admission)
        <div class="col-md-4 col-sm-6">
            <div class=" thumb">
                <a href="#" data-toggle="modal" data-target="#patient_infor_{{$admission->id}}" class="image-popup" title="click to see more information about the patient">
                    <img src="{{$admission->profile->profileImageLocation('display').$admission->profile->image->name}}" class="thumb-img" alt="work-thumbnail"  class="img-radius" height="200" width="200">
                </a>
                <div class="gal-detail">
                    <table>
                        <tr>
                            <td class="text text-primary">Name</td>
                            <td>{{$admission->profile->user->first_name}} {{$admission->profile->user->last_name}}</td>
                        </tr>
                        <tr>
                            <td class="text text-primary">Medical Condition</td>
                            <td>{{$admission->diagnose->medicalCondition->name}}</td>
                        </tr>
                        <tr>
                            <td width="180" class="text text-primary">Infection</td>
                            <td>{{$admission->diagnose->infection->name}}</td>
                        </tr>
                        <tr>
                            <td class="text text-primary">Treatment</td>
                            <td>{{$admission->diagnose->treatment->name}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @include('health::Patient.Modals.patient_infor')
	@endforeach
@endsection


