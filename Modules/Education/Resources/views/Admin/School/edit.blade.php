<!-- modal -->
<div class="modal fade" id="{{'school_'.$school->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    	<h2 class="text-primary">Edit School Info</h2>
			        <form action="{{route('admin.education.school.update',[$school->id])}}" method="post">
			        	@csrf
			             <input type="text" name="name" class="form-control" value ="{{$school->name}}"><br>
			             <select name="school_type_id" class="form-control">
			             	<option value="{{$school->schoolType->id}}">{{$school->schoolType->name}}</option>
			             	@foreach($school_types as $school_type)
			             	    @if($school->schoolType->id != $school_type->id)
				                    <option value="{{$school_type->id}}">
				                    	{{$school_type->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="school_category_id" class="form-control">
			             	<option value="{{$school->schoolCategory->id}}">
			             		{{$school->schoolCategory->name}}
			             	</option>
			             	@foreach($school_categories as $school_category)
			                    @if($school->schoolCategory->id != $school_category->id)
				                    <option value="{{$school_category->id}}">
				                    	{{$school_category->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="town_id" class="form-control">
			             	<option value="{{$school->schoolLocation->town->id}}">
			             		{{$school->schoolLocation->town->name}}
			             	</option>
			             	@foreach($districts as $district)
				             	<optgroup label="{{$district->name.' District'}}">
				             		@foreach($district->towns as $town)
				             	    @if($school->schoolLocation->town->id != $town->id)
				                    <option value="{{$town->id}}">
				                    	{{$town->name}}
				                    </option>
				                    @endif
				             	@endforeach
				             	</optgroup>
			             	@endforeach
			             </select><br>
			             <textarea name="address" placeholder="Address of the school" class="form-control">{{$school->schoolLocation->address}}</textarea><br>
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
