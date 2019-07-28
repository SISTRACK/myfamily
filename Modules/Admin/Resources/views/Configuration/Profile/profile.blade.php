@extends('admin::layouts.master')
@section('page-title')
    
@endsection
@section('page-content')
@php
    $user = $profile->user;
@endphp
<!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            
                            <div class=" member-thumb m-b-10 center-block">
                                <img src="{{$user->profile->profileImageLocation('display').$user->profile->image->name}}" class="img-radius" height="250" width="200">
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
                                 @if(session('gues'))
                                 <p><a class="btn btn-primary btn-block" href="{{route('admin.config.profile.resume',[request()->route('profile_id')])}}">Resume To My Profile</a></p>
                                 @endif
                            </div>

                        </div>

                    </div> <!-- end card-box -->

                </div> <!-- end col -->
                
                <div class="col-md-8 col-lg-9">
                	<div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 href="#"  data-toggle="modal" data-target="#biography"  class="text-custom m-b-5">Update Biography</h4>
                            <!-- modal -->
                                <div class="modal fade" id="biography" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @include('admin::Configuration.Profile.Forms.Setting.update_biography_form')
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end modal -->
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">{{$user->profile->about_me}}
		                        </p>
		                    </div>
                		</div>
                	</div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 class="text-custom m-b-5">Health Report</h4>
                            <div class="p-t-10">
                                <div class="row">
                                    @foreach($user->profile->medicalReports as $report)
                                    <div class="col-md-2"><a href="{{storage_url('Nfamily/Profile/Report/Medical/'.$user->profile->id.'/'.$report->file)}}"><i class="fa fa-file-pdf-o" style="font-size: 60px;"></i>{{$report->created_at}}</a></div><br>
                                    @endforeach
                                </div> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 href="#"  data-toggle="modal" data-target="#access"  class="text-custom m-b-5">Give People Access To Your Profile</h4>
                            <!-- modal -->
                                <div class="modal fade" id="access" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @include('admin::Configuration.Profile.Forms.Setting.profile_access_form')
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end modal -->
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 href="#"  data-toggle="modal" data-target="#living_address"  class="text-custom m-b-5">Update Living Address</h4>
                            <!-- modal -->
                                <div class="modal fade" id="living_address" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @include('admin::Configuration.Profile.Forms.Setting.update_home_address_form')
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end modal -->
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
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 href="#"  data-toggle="modal" data-target="#work_address" class="text-custom m-b-5">Update Work Address</h4>
                            <!-- modal -->
                                <div class="modal fade" id="work_address" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @include('admin::Configuration.Profile.Forms.Setting.update_business_address_form')
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end modal -->
                            <div class="p-t-10">
                                <p class="text-muted font-13">
                                    <table>
                                        <tr>
                                            <td width="200">Country</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->country->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Local Government</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Town / Village</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->company->town->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Company / Organisation</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->company->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Office</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->office->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>{{$user->profile->work != null ? $user->profile->work->address->position : ''}}</td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                	</div>
                    <hr/>
                    <h4 href="#"  data-toggle="modal" data-target="#expertice" class="text-custom m-b-5"> New Expertise</h4>
                    <!-- modal -->
                        <div class="modal fade" id="expertice" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        @include('admin::Configuration.Profile.Forms.Setting.new_expertice_form')
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end modal -->
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
                            <h4 href="#"  data-toggle="modal" data-target="#work_history" class="text-custom m-b-5">New Work History</h4>
                            <!-- modal -->
                            <div class="modal fade" id="work_history" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            @include('admin::Configuration.Profile.Forms.Setting.new_work_history_form')
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end modal -->
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
                            <h4 href="#"  data-toggle="modal" data-target="#experience" class="text-custom m-b-5">New Experience</h4>
                            <!-- modal -->
                            <div class="modal fade" id="experience" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            @include('admin::Configuration.Profile.Forms.Setting.new_experience_form')
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end modal -->
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
                    <h4 class="text-custom m-b-5">Parents</h4>
                    <div class="row">
                        @if(empty($user->profile->parents()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                            @foreach($user->profile->parents() as $parent)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{$parent['image']}}" class="thumb-img" alt="work-thumbnail"  class="img-radius" height="200" width="200">
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
                                        </table>
                                        @if($parent['user']->profile->image_id == 1 || $parent['user']->profile->image_id == 2)
                                        <form action="{{ route('admin.config.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf            
                                            <label for="inputPasswordOld">choose Picture</label>
                                            
                                                <input name="file" type="file" class="form-control" />
                                                <input type="hidden" value="{{$parent['user']->id}}" name="id">
                                            <div class="separator bottom"></div>
                                            <div class="form-actions" style="margin: 0;">
                                                <button name="submit" value="upload_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
           

                @if($user->profile->gender->name == 'Male')
                <div class="col-md-8 col-lg-9">
                    <h4 class="text-custom m-b-5">Wives</h4>
                    <div class="row">
                        @if(empty($user->profile->wives()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                           @foreach($user->profile->wives() as $wife)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{$wife['image']}}" class="thumb-img" alt="work-thumbnail"  class="img-radius" height="200" width="200">
                                    </a>
                                    <div class="gal-detail">
                                        <table>
                                            <tr>
                                                <td class="strong">Name </td>
                                                <td>{{$wife['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Email </td>
                                                <td>{{$wife['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Status </td>
                                                <td>{{$wife['status']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Born At </td>
                                                <td>{{$wife['birth_date']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Married At </td>
                                                <td>{{$wife['married_date']}}</td>
                                            </tr>
                                        </table>
                                        @if($wife['user']->profile->image_id == 1 || $wife['user']->profile->image_id == 2)
                                        <form action="{{ route('admin.config.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf            
                                            <label for="inputPasswordOld">choose Picture</label>
                                            
                                                <input name="file" type="file" class="form-control" />
                                                <input type="hidden" value="{{$wife['user']->id}}" name="id">
                                            <div class="separator bottom"></div>
                                            <div class="form-actions" style="margin: 0;">
                                                <button name="submit" value="upload_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @else
                <div class="col-md-8 col-lg-9">
                    <h4 class="text-custom m-b-5">Husband</h4>
                    <div class="row">
                        @if(empty($user->profile->thisProfileHusband()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                        <?php $husband = $user->profile->thisProfileHusband(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{$husband['image']}}" class="thumb-img" alt="work-thumbnail"  class="img-radius" height="200" width="200">
                                    </a>
                                    <div class="gal-detail">
                                        <table>
                                            <tr>
                                                <td class="strong">Name </td>
                                                <td>{{$husband['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Email </td>
                                                <td>{{$husband['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong">Married At </td>
                                                <td>{{$husband['married_date']}}</td>
                                            </tr>
                                        </table>
                                        @if($husband['user']->profile->image_id == 1 || $husband['user']->profile->image_id == 2)
                                        <form action="{{ route('admin.config.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf            
                                            <label for="inputPasswordOld">choose Picture</label>
                                            
                                                <input name="file" type="file" class="form-control" />
                                                <input type="hidden" value="{{$husband['user']->id}}" name="id">
                                            <div class="separator bottom"></div>
                                            <div class="form-actions" style="margin: 0;">
                                                <button name="submit" value="upload_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                        @endif
                    </div>
                </div>
                @endif
           
                <div class="col-md-8 col-lg-9">
                    <h4 class="text-custom m-b-5">Children</h4>
                    <div class="row">
                        @if(empty($user->profile->children()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                            @foreach($user->profile->children() as $child)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">

                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{$child['image']}}" class="thumb-img" alt="work-thumbnail" class="img-radius" height="200" width="200">
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
                                        @if($child['user']->profile->image_id == 1 || $child['user']->profile->image_id == 2)
                                        <form action="{{ route('admin.config.profile.update',[$user->profile->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf            
                                            <label for="inputPasswordOld">choose Picture</label>
                                            
                                                <input name="file" type="file" class="form-control" />
                                                <input type="hidden" value="{{$child['user']->id}}" name="id">
                                            <div class="separator bottom"></div>
                                            <div class="form-actions" style="margin: 0;">
                                                <button name="submit" value="upload_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(!session('gues'))
                <div class="col-md-8 col-lg-9">
                    
                    <div class="row">
                        @if(empty($user->profile->profileAccessibleBy()))
                            <div class="gal-detail">
                                <h3>Your profile is invisible to any one</h3>      
                            </div>
                        @else
                            <h4 class="text-custom m-b-5">We have access to your profile</h4>
                            @foreach($user->profile->profileAccessibleBy() as $accessible)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="#" class="image-popup" title="Screenshot-1">
                                        <img src="{{$accessible->profileImageLocation('display').$accessible->image->name}}" class="thumb-img" alt="work-thumbnail" data-toggle="modal" data-target="#{{$accessible->user->id}}"  class="img-radius" height="200" width="200">
                                    </a>
                                    <!-- modal -->
                                    <div class="modal fade" id="{{$accessible->user->id}}" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <img src="{{$accessible->profileImageLocation('display').$accessible->image->name}}" alt="photo" width="150" class="innerB half">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <table>
                                                            <tr>
                                                                <td>Name </td>
                                                                <td> {{$accessible->user->first_name.' '.$accessible->user->last_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@ </td>
                                                                <td>{{$accessible->user->email}}</td>
                                                            </tr>

                                                        </table>
                                                        <P><a class="btn btn-danger btn-block"  href="{{route('admin.config.profile.block.access',[$accessible->thisProfileFamily()->name,$accessible->id])}}">Block Access</a></P>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    
                    <div class="row">
                        @if(empty($user->profile->profileAccessibleTo()))
                            <div class="gal-detail">
                                <h3>You dont have access to any profile</h3>      
                            </div>
                        @else
                        <h4 class="text-custom m-b-5">You have access to these profiles</h4>
                            @foreach($user->profile->profileAccessibleTo() as $accessible)
                            <div class="col-md-4 col-sm-6">
                                <div class=" thumb">
                                    <a href="{{route('admin.config.profile.view',[$accessible->thisProfileFamily()->name, $accessible->user->id])}}" class="image-popup" title="Screenshot-1">
                                        <img src="{{$accessible->profileImageLocation('display').$accessible->image->name}}" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                    <div class="gal-detail">
                                        <table>
                                            <tr>
                                                <td>Name </td>
                                                <td>{{$accessible->user->first_name.' '.$accessible->user->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>@ </td>
                                                <td>{{$accessible->user->email}}</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection
