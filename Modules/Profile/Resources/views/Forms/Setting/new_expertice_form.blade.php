<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
    @csrf           
    <label for="inputPasswordOld">Expertice</label>
    <div class="input-group">
        <input name="expertice" type="text" id="inputPasswordOld" class="form-control" value="" placeholder="Leave empty for no change" />
        <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
    </div>
    <label for="">Level Expertice</label>
    <div class="input-group">
            <input name="percentage" type="text" id="inputPasswordOld" class="form-control" value="{{old('percentage')}}" placeholder="percentage of expertice eg 80 or 100" />
    </div>
    <div class="separator bottom"></div>
    <div class="form-actions" style="margin: 0;">
        <button name="submit" value="new_expertice" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Expertice</button>
    </div>
</form>