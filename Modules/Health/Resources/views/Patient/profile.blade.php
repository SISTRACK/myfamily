@extends('health::layouts.master')
@section('page-title')
    {{$profile->user->first_name.' '.$profile->user->last_name}}{{"'s Profile"}}
@endsection
@section('page-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class=" member-thumb m-b-10 center-block">
                                <img src="{{$profile->profileImageLocation('display').$profile->image->name}}" class="img-radius" height="250" width="200">
                            </div>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{$profile->user->first_name.' '.$profile->user->last_name}}</span></p>
                                <p class="text-muted font-13"><strong>Status :</strong> <span class="m-l-15">{{$profile->life_status_id == 1 ? 'A life' : 'Dead'}}</span></p>

                                <p class="text-muted font-13"><strong>Health Status :</strong> <span class="m-l-15">{{$profile->healthStatus()['status']}}</span></p>

                                <p class="text-muted font-13"><strong>Genotype :</strong> <span class="m-l-15">{{$profile->healthStatus()['genotype']}}</span></p>

                                <p class="text-muted font-13"><strong>Blood Group :</strong> <span class="m-l-15">{{$profile->healthStatus()['blood']}}</span></p>

                                <p class="text-muted font-13"><strong>Father Name :</strong> <span class="m-l-15">{{$profile->child != null ? $profile->child->birth->father->husband->profile->user->first_name.''.$profile->child->birth->father->husband->profile->user->last_name : 'Not Available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mother Name :</strong> <span class="m-l-15">{{$profile->child != null ? $profile->child->birth->mother->wife->profile->user->first_name.''.$profile->child->birth->mother->wife->profile->user->last_name : 'Not Available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$profile->user->phone}}</span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$profile->user->email}}</span></p>

                                <p class="text-muted font-13"><strong>Marriage :</strong> <span class="m-l-15">{{$profile->maritalStatus != null ? $profile->maritalStatus->name : 'Not Available'}}</span></p>

                                @if($profile->husband != null || $profile->wife != null)
                                    <p class="text-muted font-13"><strong>Birth :</strong> <span class="m-l-15">
                                        @if($profile->gender->name == 'Male')
                                        {{$profile->husband->father != null ? count($profile->birth()) : 0}}
                                        @else

                                        @endif
                                    </span></p>
                                @endif
                                 <p class="text-muted font-13"><strong>Married Daughters :</strong> <span class="m-l-15">{{count($profile->numberOfMarriedDaughters())}}
                                 </span></p>

                                 <p class="text-muted font-13"><strong>Married Sons :</strong> <span class="m-l-15">{{count($profile->numberOfMarriedSons())}}
                                 </span></p>
                            </div>

                        </div>

                    </div> <!-- end card-box -->

                </div> <!-- end col -->
                
                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 class="text-custom m-b-5">Health Report</h4>
                            <div class="p-t-10">
                                <div class="row">
                                    @foreach($profile->medicalReports as $report)
                                    <div class="col-md-2"><a href="{{storage_url('Nfamily/Profile/Report/Medical/'.$profile->id.'/'.$report->file)}}"><i class="fa fa-file-pdf-o" style="font-size: 60px;"></i>{{$report->created_at}}</a></div><br>
                                    @endforeach
                                </div>
                                <button class="btn btn-info" data-toggle="modal" data-target="#admit_patient">Admit Patient</button>
                                @include('health::Patient.admit')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 class="text-custom m-b-5">Living Address</h4>
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">
		                    		<table>
		                    			<tr>
		                    				<td>Country</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->area->town->lga->state->country->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>State</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->area->town->lga->state->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>Local Government</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->area->town->lga->name : ''}}</td>
		                    			</tr>
                                        <tr>
                                            <td>District</td>
                                            <td>{{$profile->leave != null ? $profile->leave->address->house->area->town->district->name : ''}}</td>
                                        </tr>
		                    			<tr>
		                    				<td>Town / Village</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->area->town->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>Area</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->area->name : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td>House No</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->house_no : ''}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td width="200">House Description</td>
		                    				<td>{{$profile->leave != null ? $profile->leave->address->house->house_desc : ''}}</td>
		                    			</tr>
		                    		</table>
		                        </p>
		                    </div>
                		</div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4 class="text-custom m-b-5">Work Address</h4>
                            <div class="p-t-10">
                                <p class="text-muted font-13">
                                    <table>
                                        <tr>
                                            <td width="200">Country</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->company->town->lga->state->country->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->company->town->lga->state->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Local Government</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->company->town->lga->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Town / Village</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->company->town->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Company / Organisation</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->company->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Office</td>
                                            <td>{{$profile->work != null ? $profile->work->address->office->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>{{$profile->work != null ? $profile->work->address->position : ''}}</td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                	</div>
                    <hr/>
                    <div class="col-md-8 col-lg-9">
                    <h4 class="text-custom m-b-5">Parents</h4>
                    <div class="row">
                        @if(empty($profile->parents()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                            @foreach($profile->parents() as $parent)
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if($profile->gender->name == 'Male')
                <div class="col-md-8 col-lg-9">
                    <h4 class="text-custom m-b-5">Wives</h4>
                    <div class="row">
                        @if(empty($profile->wives()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                           @foreach($profile->wives() as $wife)
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
                        @if(empty($profile->thisProfileHusband()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                        <?php $husband = $profile->thisProfileHusband(); ?>
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
                                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
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
                        @if(empty($profile->children()))
                            <div class="gal-detail">
                                <h3>Record not found</h3>      
                            </div>
                        @else
                            @foreach($profile->children() as $child)
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection
