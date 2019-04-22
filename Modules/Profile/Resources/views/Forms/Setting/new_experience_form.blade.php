<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
    @csrf      
    <label for="inputPasswordOld">Experience</label>
    <div class="input-group">
        <input name="experience" type="text"  class="form-control" value="" placeholder="the  title of the experience" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="inputPasswordOld">From</label>
    <div class="input-group">
        <input name="from" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="inputPasswordOld">To</label>
    <div class="input-group">
        <input name="to" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="inputPasswordOld">Source</label>
    <div class="input-group">
        <input name="address" type="text"  class="form-control" value="" placeholder="specify tge link to some of the resource" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="">About Experience</label>
    <div class="input-group">
        <textarea name="about_experience" id="" cols="100" rows="5"></textarea>
    </div>
    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button  name="submit" value="new_skill" type="submit" class="btn btn-primary" /><i class="fa fa-check"></i> Add Skill </button>
    </div>
</form>