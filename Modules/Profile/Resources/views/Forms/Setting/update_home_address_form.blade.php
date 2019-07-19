<form action="{{ route('family.member.profile.update',[$user->profile->thisProfileFamily()->name,$user->profile->id]) }}" method="post">
 @csrf
    <div class="row">
        <div class="col-md-3"><label class="control-label">Country</label></div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="country" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->country->name : ''}}" class="form-control" />
                <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"><label class="control-label">State</label></div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="state" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->name : ''}}" class="form-control" />
                <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"><label class="control-label">Local Govt</label></div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="lga" class="form-control" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->name : ''}}" />
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-3"><label class="control-label">District</label></div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="district" class="form-control" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->district->name : ''}}" />
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-3">
            <label class=" control-label">Town</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="town" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->name : ''}}" class="form-control"><span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-md-3">
            <label class=" control-label">Area</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text"name="area" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->name : ''}}" class="form-control" /><span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-3">
            <label class=" control-label">House No</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="house_no" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_no : ''}}" class="form-control" /><span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-3">
            <label class=" control-label">House Description</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <input type="text" name="house_desc" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_desc : ''}}" class="form-control" /><span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
           </div>
        </div>
    </div>  
    
    <button type="submit" name="submit" value="home_address" class="btn btn-primary btn-block"><i class="fa fa-fw fa-check"></i> Update Address</button>
</form>