<form action="{{ route('family.member.profile.update',[$user->profile->family->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data"> 
    @csrf 

    <label for="inputPasswordOld">genotype</label>
    <select class="form-control" name="genotype">
    	<option>genotype</option>
    	@foreach($user->profile->genotype() as $genotype)
            <option value="{{$genotype->id}}">{{$genotype->name}}</option>
    	@endforeach
    </select>
    

    <label for="">Blood Group</label>
    <select class="form-control" name="blood">
    	<option class="form-control">blood group</option>
    	@foreach($user->profile->blood() as $blood)
            <option value="{{$blood->id}}">{{$blood->name}}</option>
    	@endforeach
    </select>
   
    <label for="">Current Heath Condition</label>
    <input type="text" name="desease" class="form-control" placeholder="example Normal" />
    

    <label for="">Current Weight</label>
    <input type="text" name="weight" class="form-control" placeholder="weight in eg 34 kg" />

    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button  type="submit" name="submit" value="new_health" class="btn btn-primary" /><i class="fa fa-check"></i> Update Health </button>
    </div>
</form>