<form action="{{ route('family.member.profile.update',[$user->profile->family->name,$user->profile->id]) }}" method="post" enctype="multipart/form-data"> 
    @csrf      
    <label for="inputPasswordOld">Date</label>
    <div class="input-group">
        <input name="work_history_date" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="">History</label>
    <div class="input-group">
        <textarea name="history" id="" cols="60" rows="5"></textarea>
    </div>
    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button  type="submit" name="submit" value="work_history" class="btn btn-primary" /><i class="fa fa-check"></i> Add Work History </button>
    </div>
</form>