@extends('education::layouts.master')

@section('page-content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class=" member-thumb m-b-10 center-block">
                                @if($user->profile->image->id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" class="img-radius" height="250" width="200">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" class="img-radius" height="250" width="200">
                                @endif
                            </div>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{$user->first_name.' '.$user->last_name}}</span></p>
                                <p class="text-muted font-13"><strong>Status :</strong> <span class="m-l-15">{{$user->profile->life_status_id == 1 ? 'A life' : 'Dead'}}</span></p>

                                <p class="text-muted font-13"><strong>Health Status :</strong> <span class="m-l-15">{{$user->profile->healthStatus()['status']}}</span></p>

                                <p class="text-muted font-13"><strong>Genotype :</strong> <span class="m-l-15">{{$user->profile->healthStatus()['genotype']}}</span></p>

                                <p class="text-muted font-13"><strong>Blood Group :</strong> <span class="m-l-15">{{$user->profile->healthStatus()['blood']}}</span></p>

                                <p class="text-muted font-13"><strong>Father Name :</strong> <span class="m-l-15">{{$user->profile->child != null ? $user->profile->child->birth->father->husband->profile->user->first_name.''.$user->profile->child->birth->father->husband->profile->user->last_name : 'Not Available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mother Name :</strong> <span class="m-l-15">{{$user->profile->child != null ? $user->profile->child->birth->mother->wife->profile->user->first_name.''.$user->profile->child->birth->mother->wife->profile->user->last_name : 'Not Available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$user->phone}}</span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$user->email}}</span></p>

                                <p class="text-muted font-13"><strong>Marriage :</strong> <span class="m-l-15">{{$user->profile->maritalStatus != null ? $user->profile->maritalStatus->name : 'Not Available'}}</span></p>

                                @if($user->profile->husband != null || $user->profile->wife != null)
                                    <p class="text-muted font-13"><strong>Birth :</strong> <span class="m-l-15">
                                        @if($user->profile->gender->name == 'Male')
                                        {{$user->profile->husband->father != null ? count($user->profile->birth()) : 0}}
                                        @else

                                        @endif
                                    </span></p>
                                @endif
                                 <p class="text-muted font-13"><strong>Married Daughters :</strong> <span class="m-l-15">{{count($user->profile->numberOfMarriedDaughters())}}
                                 </span></p>

                                 <p class="text-muted font-13"><strong>Married Sons :</strong> <span class="m-l-15">{{count($user->profile->numberOfMarriedSons())}}
                                 </span></p>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
                <div class="col-md-8 col-lg-9">
                	<div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 href="#"  data-toggle="modal" data-target="#biography"  class="text-custom m-b-5">Biography</h4>
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">{{$user->profile->about_me}}
		                        </p>
		                    </div>
                		</div>
                	</div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                        <div class="widget widget-tabs widget-tabs-gray border-bottom-none">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="btn btn-info btn-block" data-toggle="tab" href="#health">Health</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="btn btn-info btn-block" data-toggle="tab" href="#education">Education</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="btn btn-info btn-block" data-toggle="tab" href="#security">Security</h4>
                                    </div>
                                    @if(count($user->profile->admitteds->where('school_id',schoolAdmin()->school->id)) < 1)
                                    <div class="col-md-3">
                                        <h4 class="btn btn-info btn-block" data-toggle="tab" href="#admit">Give Admission</h4>
                                    </div>
                                    @endif
                                </div>
                                <div class="p-t-10">
                                    <div class="row">
                                        @php
                                            $profile = $user->profile;
                                        @endphp
                                        <div class="widget-body">
                                            <div class="tab-content">
                                                <div class=" tab-pane active alert alert-success">
                                                Click the report above to view here !!!
                                                </div>
                                                @include('profile::Profile.Report.health')
                                                @include('profile::Profile.Report.education')
                                                @include('profile::Profile.Report.security')
                                                @include('education::Education.School.Admission.create')
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr/>
                    <div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 href="#"  data-toggle="modal" data-target="#living_address"  class="text-custom m-b-5">Living Address</h4>
                            
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">
		                    		<table>
		                    			<tr>
		                    				<td>Country</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->country->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>State</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>Local Government</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->name : ''}}</td>
		                    			</tr>
                                        <tr>
                                            <td>District</td>
                                            <td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->district->name : ''}}</td>
                                        </tr>
		                    			<tr>
		                    				<td>Town / Village</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>Area</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->area->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>House No</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->house_no : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td width="200">House Description</td>
		                    				<td>{{$user->profile->leave != null ? $user->profile->leave->address->house->house_desc : ''}}</td>
		                    			</tr>
		                    		</table>
		                        </p>
		                    </div>
                		</div>
                    </div>
                    <hr/>
                    @if($user->profile->child)
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 href="#"  data-toggle="modal" data-target="#work_address" class="text-custom m-b-5">Father's Work Address</h4>
                            <div class="p-t-10">
                                <p class="text-muted font-13">
                                    <table>
                                        <tr>
                                            <td width="200">Country</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->company->town->lga->state->country->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->company->town->lga->state->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Local Government</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->company->town->lga->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Town / Village</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->company->town->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Company / Organisation</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->company->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Office</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->office->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>{{$user->profile->child->birth->father->husband->profile->work != null ? $user->profile->child->birth->father->husband->profile->work->address->position : ''}}</td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                	</div>
                    <hr/>
                    @endif
                    <h4 href="#"  data-toggle="modal" data-target="#expertice" class="text-custom m-b-5">Expertise</h4>
                    <div class="row m-t-20">
                        @foreach($user->profile->currentProfileExpertice() as $expertice)
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="p-t-10">
                                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round
                                       data-fgColor="#2abfcc" value="{{($expertice['percentage'])}}" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                                <h6 class="text-muted m-t-10">{{$expertice['name']}}</h6>
                            </div>
                        </div><!-- end col-->
                        @endforeach                                               
                    </div> <!-- end row -->
                    <hr/>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 href="#"  data-toggle="modal" data-target="#work_history" class="text-custom m-b-5">Work History</h4>
                            @foreach($user->profile->thisProfileWorkHistory() as $history)

                            <div class=" p-t-10">
                                <p><b>{{$history['date']}}</b></p>

                                <p class="text-muted font-13 m-b-0">{{$history['history']}}. @ <a href="#">{{$history['place'] != null ? $history['place'] : 'Workin place not available' }}</a>
                                </p>
                            </div>
                            
                            @endforeach
                        </div> <!-- end col -->

                    </div> <!-- end row -->
                    <hr/>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 href="#"  data-toggle="modal" data-target="#experience" class="text-custom m-b-5">Experiences</h4>
                            
                            @foreach($user->profile->currentProfileExperience() as $experience)
                            <div class=" p-t-10">
                                <h5 class="">{{$experience['name']}}</h5>
                                <p class="text-custom m-b-5">At <a href="{{$experience['address']}}">{{$experience['address']}}</a></b></p>
                                <p><b> From {{$experience['from']}} To {{$experience['to']}}</b></p>
                                <p><b> Duration in Months <b class="text-custom m-b-5">{{$experience['duration']}}</b></b></p>
                                <p class="text-muted font-13 m-b-0">{{$experience['about']}}
                                </p>
                            </div>
                             @endforeach
                            <hr/>   
                        </div> <!-- end col -->

                    </div> <!-- end row -->
                    <div class="col-md-8 col-lg-9">
                    	@if(!empty($user->profile->parents()))
	                    <h4 class="text-custom m-b-5">Parents</h4>
	                    <div class="row">
                            @foreach($user->profile->parents() as $parent)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{asset($parent['image'])}}" class="thumb-img" alt="work-thumbnail"  class="img-radius" height="200" width="200">
                                    </a>
                                    <div class="gal-detail">
                                        <table>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{$parent['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$parent['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>{{$parent['status']}}</td>
                                            </tr>
                                            <tr>
                                                <td>GSM</td>
                                                <td></td>
                                            </tr>
                                        </table>
    
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                
            	    @if(!empty($user->profile->children()))
                    <h4 class="text-custom m-b-5">Children</h4>
                    <div class="row">
                            @foreach($user->profile->children() as $child)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">

                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{asset($child['image'])}}" class="thumb-img" alt="work-thumbnail" class="img-radius" height="200" width="200">
                                    </a>
                                    <div class="gal-detail">
                                        <table>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{$child['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$child['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Born At</td>
                                                <td>{{$child['birth_date']}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
