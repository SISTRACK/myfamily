<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post">
    @csrf
    <div class="col-md-10">

        <div class="separator line bottom"></div>
        Biography<br />
        <textarea name="about_me"id="mustHaveId" class="wysihtml5 form-control" rows="5">{{$user->profile->about_me}}</textarea>
        <!-- Form actions -->
        <div class="separator top">
            <button type="submit" name="submit" value="new_biography" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Save changes</button>
            <button type="button" class="btn btn-default"><i class="fa fa-fw fa-times"></i> Cancel</button>
        </div>

    </div>
</form>