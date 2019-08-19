@extends('education::layouts.master')

@section('page-content')
	
	@if(empty(schoolAdmin()->school->studentToGraduateThisYearAndElear()))
	<div class="alert alert-success h4">No Graduation Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Adm No</th>
        			<th>Admited At</th>
        			<th>Graduated At</th>
        			<th>Reports</th>
        			<th>Father</th>
        			<th>Student</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach(schoolAdmin()->school->studentToGraduateThisYearAndElear() as $graduate)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$graduate->admission_no}}</td>
	        			<td>{{$graduate->year}}</td>
	        			<td>{{$graduate->graduated ? $graduate->graduated->year : 'not graduated'}}</td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#edit_report_'.$graduate->id}}">{{count($graduate->schoolReports)}}
	        				</button>
	        			</td>
	        			<td>
                            @if($graduate->profile->child)
                                <a href="#" data-toggle="modal" data-target="#user_{{$graduate->profile->child->birth->father->husband->profile->id}}">{{$graduate->profile->child->birth->father->husband->profile->user->first_name.' '.$graduate->profile->child->birth->father->husband->profile->user->last_name}}
                                    @php
                                        $profile = $graduate->profile->child->birth->father->husband->profile;
                                    @endphp
                                    @include('education::Education.School.Admission.display')
                                
                                </a>
                            @else
                             Not Available   
                            @endif
                        </td>
                        <td><a href="#" data-toggle="modal" data-target="#user_{{$graduate->profile->id}}">{{$graduate->profile->user->first_name}} {{$graduate->profile->user->last_name}}</a>
                            @php
                                $profile = $graduate->profile;
                            @endphp
                            @include('education::Education.School.Admission.display')
                        </td>
	        				@if(!$graduate->graduated)
        				    <button class="btn btn-primary" data-toggle="modal" data-target="{{'#report_'.$graduate->id}}"><i class="fa fa-pencil" ></i>
        				    </button>
	        				@endif
	        			</td>
	        		</tr>
	        		
	        		    @include('education::Education.School.Report.edit')
                   
	        		    @include('education::Education.School.Report.create')

            	@endforeach
            </tbody>
        </table>
    @endif
@endsection