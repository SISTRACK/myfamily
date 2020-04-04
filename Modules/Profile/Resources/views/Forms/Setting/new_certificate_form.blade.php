@if(isset($admission))
<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
    @csrf     
    <div class="input-grop">
        <input name="certificate" type="file" id="inputPasswordOld" class="form-control"/>
    </div><br>
    <input type="hidden" name="graduation_id" value="{{$admission->graduated->id}}">
    <div class="form-actions" style="margin: 0;">
        <button name="submit" value="new_certificate" class="btn btn-info"><i class="fa fa-checked"></i> Upload Certificate</button>
    </div>
</form>
@else
    <div class="alert alert-danger">No admission record found</div>
@endif