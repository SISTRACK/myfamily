<form action="{{ route('admin.config.profile.update',[$user->profile->id]) }}" method="post">
 @csrf       
        <!-- Group -->
        <div class="form-group">
            <label class="col-md-3 control-label">Country</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" name="country" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->country->name : ''}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <!-- // Group END -->
        
        <!-- Group -->
        <div class="form-group">
            <label class="col-md-3 control-label">State</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" name="state" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->name : ''}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <!-- // Group END -->
        
        <!-- Group -->
        <div class="form-group">
            <label class="col-md-3 control-label">Local Govt</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" name="lga" id="datepicker1" class="form-control" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->name : ''}}" />
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        
   
        <div class="form-group">
            <label class="col-md-3 control-label">Town</label>
            <div class="col-md-9">
                <input type="text" name="town" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->name : ''}}" class="form-control">
            </div>
        </div>
        <!-- // Group END -->
        
        <!-- Group -->
        <div class="form-group">
            <label class="col-md-3 control-label">Company</label>
            <div class="col-md-9">
                <input type="text" name="company" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->name : ''}}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Office</label>
            <div class="col-md-9">
                <input type="text" name="office" value="{{$user->profile->work != null ? $user->profile->work->address->office->name : ''}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Position</label>
            <div class="col-md-9">
                <input type="text" name="position" value="{{$user->profile->work != null ? $user->profile->work->address->position : ''}}" class="form-control" />
            </div>
        </div>
        <!-- // Group END -->
        
    

    <button type="submit" name="submit" value="business_address" class="btn btn-primary btn-block"><i class="fa fa-fw fa-check"></i> Update Address</button>

</form>