<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8">
        <label for="inputPhone">Contact Address</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
            <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
            <span class="input-group-addon"><i class="fa fa-skype"></i></span>
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
            <input name="contact" type="text" id="inputPhone" class="form-control" placeholder="Enter contact address" value="{{old('contact')}}" />
        </div>
        <div class="separator bottom"></div>
            
        <label for="inputEmail">Contact Type</label>
        <div class="">
            <select name="type" id="" class="form-control">
            <option value=""></option>
            
                <option value="{{'1'}}">{{'Facebook'}}</option>
                
            </select>
        </div>
        <div class="separator bottom"></div>
        <div class="form-actions" style="margin: 0;">
            <button name="submit" value="new_contact" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Contact</button>
        </div>
    </div>
</form>