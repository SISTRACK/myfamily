    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label">Country</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->country->name : ''}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">State</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->name : ''}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Local Govt</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" id="datepicker1" class="form-control" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->name : ''}}" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label">Town</label>
            <div class="col-md-9">
                <input readonly type="text" name="gender" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->name : ''}}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Area</label>
            <div class="col-md-9">
                <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->name : ''}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">House No</label>
            <div class="col-md-9">
                <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_no : ''}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">House Description</label>
            <div class="col-md-9">
                <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_desc : ''}}" class="form-control" />
            </div>
        </div>
    </div>