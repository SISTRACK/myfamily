@extends('admin::layouts.master')

@section('page-title')
    {{ Breadcrumbs::render('admin.state.dashboard',$state) }}
@endsection
@section('page-content')
	@if(isset($state))
	    @foreach($state->lgas as $lga)
			<div class="col-lg-4 col-md-6 col-sm-8">
			    <div class="card-box widget-box-one">
			    	<a href="{{route('lga.dashboard',[
			    	strtolower(str_replace(' ','-',$lga->state->name)),
			    	strtolower(str_replace(' ','-',$lga->name)),
			    	$lga->id])}}">
				        <div class="wigdet-one-content center">
				            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="{{'Click here to see more of ' .strtoupper($lga->name). ' LGA'}}">{{strtoupper($lga->name). ' LGA'}}</p>
				            <h4 class="btn btn-success">{{count($lga->districts)}} {{' DISTRICTS'}}</h4>
				        </div>
			        </a>
			    </div>
			</div>
	    @endforeach 
	@endif
@endsection

@section('footer')
    <script type="text/javascript">
        function remove(current){
            current.parentNode.remove()
        }
        document.getElementById("add_lga").onclick = function() {
            var e = document.createElement('div');
            e.innerHTML = "<input type='text' name='lgas[]' class='form-control add-input' placeholder='local government name' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("lga").appendChild(e);
        }
    </script>
@endsection