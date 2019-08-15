@extends('education::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('education.school.admission.create',[date('Y')])}}" style="color: white"><i class="fa fa-plus"></i></a></button>
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
	        			<td>{{$admission->created_at}}</td>
	        			<td><a href="#">{{$admission->profile->child ? $admission->profile->child->birth->father->husband->profile->user->first_name.' '.$admission->profile->child->birth->father->husband->profile->user->last_name : 'not available'}}
	        			</a></td>
	        			<td><a href="#">{{$admission->profile->user->first_name}} {{$admission->profile->user->last_name}}</a></td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#admission_'.$admission->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				
	        				<button class="btn btn-warning"><a href="{{route('education.school.admission.delete',[date('Y'), $admission->id])}}"><i class="fa fa-delete">Delete</i></a></button>
	        			</td>
	        		</tr>
	        		@include('education::Education.School.Admission.edit')
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


