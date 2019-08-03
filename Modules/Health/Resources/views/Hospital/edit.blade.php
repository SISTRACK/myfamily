<!-- modal -->
<div class="modal fade" id="{{'hospital_'.$hospital->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <div class="col-md-12">
			    	<h2 class="text-primary">New Hospital</h2>
			        <form action="{{route('admin.health.hospital.update',[$hospital->id])}}" method="post">
			        	@csrf
			             <input type="text" name="name" class="form-control" value ="{{$hospital->name}}"><br>
			             <select name="hospital_type_id" class="form-control">
			             	<option value="{{$hospital->hospitalType->id}}">{{$hospital->hospitalType->name}}</option>
			             	@foreach($hospital_types as $hospital_type)
			             	    @if($hospital->hospitalType->id != $hospital_type->id)
				                    <option value="{{$hospital_type->id}}">
				                    	{{$hospital_type->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="hospital_category_id" class="form-control">
			             	<option value="{{$hospital->hospitalCategory->id}}">
			             		{{$hospital->hospitalCategory->name}}
			             	</option>
			             	@foreach($hospital_categories as $hospital_category)
			                    @if($hospital->hospitalCategory->id != $hospital_category->id)
				                    <option value="{{$hospital_category->id}}">
				                    	{{$hospital_category->name}}
				                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <select name="town_id" class="form-control">
			             	<option value="{{$hospital->hospitalLocation->town->id}}">
			             		{{$hospital->hospitalLocation->town->name}}
			             	</option>
			             	@foreach($towns as $town)
			             	    @if($hospital->hospitalLocation->town->id != $town->id)
			                    <option value="{{$town->id}}">
			                    	{{$town->name}}
			                    </option>
			                    @endif
			             	@endforeach
			             </select><br>
			             <textarea name="address" placeholder="Address of the hospital" class="form-control">{{$hospital->hospitalLocation->address}}</textarea><br>
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
