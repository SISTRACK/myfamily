<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
    @csrf 
    <label for="inputPasswordOld">Certificate Name</label>
    <div class="">
        <input name="name" type="text"  class="form-control" value="{{old('name')}}" placeholder="example primary certificate" />
    </div>          
    <label for="inputPasswordOld">Upload Certificate</label>
    <div class="input-grop">
        <input name="certificate" type="file" id="inputPasswordOld" class="form-control" value="" placeholder="Leave empty for no change" />
        
    </div>
    <label for="inputPasswordOld">Date Issued</label>
    <div class="">
        <input name="date" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
    </div>
    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button name="submit" value="new_certificate"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add New Certificate</button>
    </div>
</form>