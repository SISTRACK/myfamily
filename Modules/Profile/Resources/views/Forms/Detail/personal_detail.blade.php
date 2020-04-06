    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label">First Name</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" value="{{$user->first_name}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Last Name</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" value="{{$user->last_name}}" class="form-control" />
                    <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Date of birth</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" id="datepicker1" class="form-control" value="{{date('M/D/Y',$user->profile->date_of_birth)}}" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label">Gender</label>
            <div class="col-md-9">
                <input readonly type="text" name="gender" value="{{$user->profile->gender->name}}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Age</label>
            <div class="col-md-9">
                <input readonly type="text" value="{{floor($user->profile->date/31622400) != 0 ? floor($user->profile->date/31622400) : 'Not Available'}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">FID</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input readonly type="text" id="datepicker1" class="form-control" value="{{$user->profile->FID}}" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>