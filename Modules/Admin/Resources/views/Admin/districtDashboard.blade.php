@extends('admin::layouts.master')
@section('page-title')
    {{ Breadcrumbs::render('admin.district.dashboard',$district) }}
@endsection
@section('page-content')
	
    <div class="col-lg-4 col-md-6 col-sm-8">
	    <a href="{{route('admin.state.lga.district.profile.index',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">
	        <div class="card-box widget-box-one">
	            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
	            <div class="wigdet-one-content">
	                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">{{str_plural('Profile',count($district->users()))}}</p>
	                <h2>{{count($district->users())}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
 	            </div>
	        </div>
	    </a>
	</div><!-- end col -->

	<div class="col-lg-4 col-md-6 col-sm-8">
		<a href="#"  data-toggle="modal" data-target="#families">
		    <div class="card-box widget-box-one">
		        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
		        <div class="wigdet-one-content">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Families</p>
		            <h2>{{count($district->families())}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
		           
 		        </div>
		    </div>
		</a>
        @include('admin::Admin.Modals.families')
	</div><!-- end col -->


	<div class="col-lg-4 col-md-6 col-sm-8">
		<a href="#"  data-toggle="modal" data-target="#marriages">
		    <div class="card-box widget-box-one">
		        <i class="mdi mdi-account-convert widget-one-icon"></i>
		        <div class="wigdet-one-content">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Marriages</p>
		            <h2>{{count($district->marriages())}}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
		            <p class="text-muted m-0"><b>Last:</b> 1250</p>
		        </div>
		    </div>
		    @include('admin::Admin.Modals.marriages')
	    </a>
	</div><!-- end col -->

	<div class="col-lg-4 col-md-6 col-sm-8">
		<a href="{{route('admin.state.lga.district.birth.index',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}"  data-toggle="modal" data-target="#births">
		    <div class="card-box widget-box-one">
		        <i class="mdi mdi-layers widget-one-icon"></i>
		        <div class="wigdet-one-content">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Births</p>
		            <h2>{{count($district->births())}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
		        </div>
		    </div>
	    </a>
	</div><!-- end col -->

	<div class="col-lg-4 col-md-6 col-sm-8">
		<a href="#"  data-toggle="modal" data-target="#deaths">
		    <div class="card-box widget-box-one">
		        <i class="mdi mdi-av-timer widget-one-icon"></i>
		        <div class="wigdet-one-content">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Deaths</p>
		            <h2>{{count($district->deaths())}}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
		           
		        </div>
		    </div>
		    @include('admin::Admin.Modals.deaths')
		</a>
	</div><!-- end col -->
	<div class="col-lg-4 col-md-6 col-sm-8">
	    <div class="card-box widget-box-one">
	        <i class="mdi mdi-download widget-one-icon"></i>
	        <div class="wigdet-one-content">
	            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Divorces</p>
	            <h2>{{count($district->divorces())}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
	            
	        </div>
	    </div>
	</div><!-- end col -->
	                

	<div class="col-lg-4 col-md-6 col-sm-8">
	    <div class="card-box widget-box-one">
	        <i class="mdi mdi-download widget-one-icon"></i>
	        <div class="wigdet-one-content">
	            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Return Divorces</p>
	            <h2>{{count($district->returnDivorces())}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
	            
	        </div>
	    </div>
	</div>  
	<div class="col-lg-4 col-md-6 col-sm-8">
	    <div class="card-box widget-box-one">
	        <i class="fa fa-home widget-one-icon"></i>
	        <div class="wigdet-one-content">
	            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Villages/Towns</p>
	            <h2>{{count($district->towns)}}</h2>
	            
	        </div>
	    </div>
	</div>                 
@endsection

@section('footer')
    <script type="text/javascript">
        function remove(current){
            current.parentNode.remove()
        }
        document.getElementById("add_town").onclick = function() {
            var e = document.createElement('div');
            e.innerHTML = "<input type='text' name='towns[]' class='form-control add-input' placeholder='Town/Village Name' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("town").appendChild(e);
        }
    </script>
@endsection