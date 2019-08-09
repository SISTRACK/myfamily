<!-- modal -->
<div class="modal fade" id="{{'court_'.$court->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    	<h2 class="text-primary">Edit Court Info</h2>
			        <form action="{{route('admin.security.court.update',[$court->id])}}" method="post">
			        	@csrf
			             <input type="text" name="name" class="form-control" value ="{{$court->name}}"><br>
			             <select name="court_type_id" class="form-control">
			             	<option value="{{$court->courtType->id}}">{{$court->courtType->name}}</option>
			             	@foreach($court_types as $court_type)
			             	    @if($court->courtType->id != $court_type->id)
				                    <option value="{{$court_type->id}}">
				                    	{{$court_type->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="court_category_id" class="form-control">
			             	<option value="{{$court->courtCategory->id}}">
			             		{{$court->courtCategory->name}}
			             	</option>
			             	@foreach($court_categories as $court_category)
			                    @if($court->courtCategory->id != $court_category->id)
				                    <option value="{{$court_category->id}}">
				                    	{{$court_category->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="town_id" class="form-control">
			             	<option value="{{$court->courtLocation->town->id}}">
			             		{{$court->courtLocation->town->name}}
			             	</option>
			             	@foreach($districts as $district)
				             	<optgroup label="{{$district->name.' District'}}">
				             		@foreach($district->towns as $town)
				             	    @if($court->courtLocation->town->id != $town->id)
				                    <option value="{{$town->id}}">
				                    	{{$town->name}}
				                    </option>
				                    @endif
				             	@endforeach
				             	</optgroup>
			             	@endforeach
			             </select><br>
			             <textarea name="address" placeholder="Address of the court" class="form-control">{{$court->courtLocation->address}}</textarea><br>
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
