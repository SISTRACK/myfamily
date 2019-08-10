<!-- modal -->
<div class="modal fade" id="{{'station_'.$station->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    	<h2 class="text-primary">Edit Police Station Info</h2>
			        <form action="{{route('admin.security.police.station.update',[$station->id])}}" method="post">
			        	@csrf
			             <input type="text" name="name" class="form-control" value ="{{$station->name}}"><br>
			             <select name="police_station_type_id" class="form-control">
			             	<option value="{{$station->policeStationType->id}}">{{$station->policeStationType->name}}</option>
			             	@foreach($station_types as $station_type)
			             	    @if($station->policeStationType->id != $station_type->id)
				                    <option value="{{$station_type->id}}">
				                    	{{$station_type->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="police_station_category_id" class="form-control">
			             	<option value="{{$station->policeStationCategory->id}}">
			             		{{$station->policeStationCategory->name}}
			             	</option>
			             	@foreach($station_categories as $station_category)
			                    @if($station->policeStationCategory->id != $station_category->id)
				                    <option value="{{$station_category->id}}">
				                    	{{$station_category->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="town_id" class="form-control">
			             	<option value="{{$station->policeStationLocation->town->id}}">
			             		{{$station->policeStationLocation->town->name}}
			             	</option>
			             	@foreach($districts as $district)
				             	<optgroup label="{{$district->name.' District'}}">
				             		@foreach($district->towns as $town)
				             	    @if($station->policeStationLocation->town->id != $town->id)
				                    <option value="{{$town->id}}">
				                    	{{$town->name}}
				                    </option>
				                    @endif
				             	@endforeach
				             	</optgroup>
			             	@endforeach
			             </select><br>
			             <textarea name="address" placeholder="Address of the police station" class="form-control">{{$station->policeStationLocation->address}}</textarea><br>
			             <button class="btn btn-primary">Save Changes</button>
			         </form>
			    </div>
			    <div class="col-md-4"></div>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
