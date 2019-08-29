@extends('education::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('education.school.admission.create',[request()->route('year')])}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($admissions))
	<div class="alert alert-success h4">No Admission Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Adm No</th>
        			<th>admited At</th>
        			<th>Father</th>
        			<th>Student</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($admissions as $admission)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$admission->admission_no}}</td>
	        			<td>{{$admission->year}}</td>
	        			<td>
                            @if($admission->profile->child)
                                <a href="#" data-toggle="modal" data-target="#user_{{$admission->profile->child->birth->father->husband->profile->id}}">{{$admission->profile->child->birth->father->husband->profile->user->first_name.' '.$admission->profile->child->birth->father->husband->profile->user->last_name}}
                                    @php
                                        $profile = $admission->profile->child->birth->father->husband->profile;
                                    @endphp
                                    @include('education::Education.School.Admission.display')
                                
    	        			    </a>
                            @else
                             Not Available   
                            @endif
                        </td>
	        			<td><a href="#" data-toggle="modal" data-target="#user_{{$admission->profile->id}}">{{$admission->profile->user->first_name}} {{$admission->profile->user->last_name}}</a>
                            @php
                                $profile = $admission->profile;
                            @endphp
                            @include('education::Education.School.Admission.display')
                        </td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#admission_'.$admission->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				@if(!$admission->graduated)
	        				<button class="btn btn-warning"><a href="{{route('education.school.admission.delete',[request()->route('year'), $admission->id])}}"><i class="fa fa-delete">Delete</i></a></button>
                            @endif
	        			</td>
	        		</tr>
	        		@include('education::Education.School.Admission.edit')
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


