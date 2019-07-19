<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
    @csrf            
    <label for="inputPasswordOld">Upload Picture</label>
    
        <input name="file" type="file" class="form-control" />
    
    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button name="submit" value="upload_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
    </div>
</form>