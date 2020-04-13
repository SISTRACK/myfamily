<form id="wizard-vertical" action="{{route('district.family.marriage.register',[$district->lga->state->name,$district->lga->name,$district->name,$family_admin->family->id])}}" method="POST">
	@csrf
	<h3>Husband Info</h3>
	<section>
		@if(session('register')['status'] == 'father')
		<input type="hidden" name="user_id" value="{{$family_admin->user->id}}">
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Husband First Name</label>
			<div class="col-lg-8">
				<input value="{{$family_admin->user->first_name}}" placeholder="Husband First Name" class="form-control required" id="userName1" name="husband_first_name" type="text" value="{{old('husband_first_name')}}" >
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
			<div class="col-lg-8">
				<input value="{{$family_admin->user->last_name}}" value="{{old('husband_last_name')}}" placeholder="Husband Last Name"  id="husband_last_name" name="husband_last_name" type="text" class="required form-control" >
			</div>
		</div>
		@elseif(session('register')['status'] == 'son')
        <div class="form-group clearfix">
		<label class="col-lg-4 control-label " for="husband_first_name">Husband First Name</label>
			<div class="col-lg-8">
				<select class="form-control" name="husband_first_name">
					<option value=""></option>
					
                        @foreach($family_admin->family->unMarriedSons() as $childProfile)
                            <option value="{{$childProfile->user->id}}">{{$childProfile->user->first_name}}</option>
                        @endforeach
					
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
			<div class="col-lg-8">
				<select class="form-control" name="husband_last_name">
					<option value=""></option>
					@foreach($family_admin->family->unMarriedSons() as $childProfile)
							<option value="{{$childProfile->user->id}}">{{$childProfile->user->last_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		@else
		<section>
		<div class="widget widget-tabs widget-tabs-gray border-bottom-none">
        <!-- Widget heading -->
        <div class="widget-head">
            <strong class="lead">Did the Husband has family account created ? </strong>
            <button  class="active btn btn-primary"  href="#yes" data-toggle="tab">Yes</button>
            <button class="btn btn-warning" value="" href="#no" data-toggle="tab">No</button>
            <button class="btn btn-infor" value="" href="#why" data-toggle="tab">Why ?</button>
        </div>
        <!-- // Widget heading END -->
        <div class="widget-body">
            <div class="tab-content">
                <!-- Tab content -->
                <div class="tab-pane active" id="default">
                   <strong>Please answer question above !</strong>
                </div>
                
                <div class="tab-pane" id="why">
                    <strong>You need to have a family account in order to register any marriage and establish connection between the wife family and husband family to enable us to easely pass information from one family to another like invetation.  
                    </strong>
                </div>

                <div class="tab-pane" id="no">
                    <strong>We assume that this husband doesn't have family account by filling this form we will automatically create one for him but if he has click here <a  href="#yes" data-toggle="tab"><i></i>yes he has</a></li></strong>
                    <div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_first_name">Husband First Name</label>
						<div class="col-lg-8">
							<input type="hidden" name="inlaw" value="inlaw">
							<input placeholder="Husband First Name" class="form-control required" id="userName1" name="husband_first_name" type="text" value="{{old('husband_first_name')}}">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
						<div class="col-lg-8">
							<input value="{{old('husband_last_name')}}" placeholder="Husband Last Name"  id="husband_last_name" name="husband_last_name" type="text" class="required form-control">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband Email</label>
						<div class="col-lg-8">
							<input value="{{old('new_husband_email')}}" placeholder="Husband Email"  id="husband_last_name" name="new_husband_email" type="email" class="required form-control">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Date Of Birth</label>
						<div class="col-lg-8">
							<input value="{{old('husband_date')}}" id="husband_date" name="husband_date" type="date" class="required form-control">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband Tribe</label>
						<div class="col-lg-8">
							<select class="form-control" name="tribe">
								<option value=""></option>
			   					@if($tribes)
                                    @foreach($tribes as $tribe)
                                        <option value="{{$tribe->id}}">{{$tribe->name}}</option>
                                    @endforeach
								@endif
							</select>
						</div>
					</div>
                </div>

                <!--wife family tab-->
                <div class="tab-pane" id="yes">
                     <div class="form-group clearfix">
                        <label class="col-lg-4 control-label " for="name">Husband Email</label>
                        <div class="col-lg-8">
                            <input placeholder="Husband Family E-mail Address" class="form-control" value="{{ old('husband_email') }}" id="name" name="husband_email" type="email">
                        </div>
                    </div>
                </div>
                <!-- end wife family tab-->
            </div>
        </div>
    </div>
	</section>
     
		@endif
	</section>
	<h3>Wife Info</h3>
	@if(session('register')['status'] == 'daughter')
	<section>
        <div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Wife First Name</label>
			<div class="col-lg-8">
				<select name="wife_first_name" class="form-control"  >
					<option value=""></option>
					
                        @foreach($family_admin->family->unMarriedDaughters() as $childProfile)
                            <option value="{{$childProfile->user->id}}">{{$childProfile->user->first_name}}</option>
                        @endforeach
					
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Wife Last Name</label>
			<div class="col-lg-8">
				<select name="wife_last_name" class="form-control"  >
					<option value=""></option>
					    @foreach($family_admin->family->unMarriedDaughters() as $childProfile)
                            <option value="{{$childProfile->user->id}}">{{$childProfile->user->last_name}}</option>
                        @endforeach
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Wife Status</label>
			<div class="col-lg-8">
				<select name="wife_status" class="form-control" value="{{old('wife_status')}}" >
					<option value=""></option>
					
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
					
				</select>
			</div>
		</div>
	</section>
	@else
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="wife_first_name">Wife First Name</label>
			<div class="col-lg-8">
				<input value="{{old('wife_first_name')}}" placeholder="Wife First Name" class="form-control required" id="wife_first_name" name="wife_first_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label" for="wife_last_name">Wife last Name</label>
			<div class="col-lg-8">
				<input value="{{old('wife_first_name')}}" placeholder="Wife Last Name"  class="form-control required" id="wife_last_name" name="wife_last_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Wife Status</label>
			<div class="col-lg-8">
				<select name="wife_status" class="form-control" value="{{old('wife_status')}}" >
					<option value=""></option>
					@if($family_admin->family->familyWivesStatusRemain())
                        @foreach($family_admin->family->familyWivesStatusRemain() as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
					@endif
				</select>
			</div>
		</div>
	</section>
	@endif
	<h3>Marriage Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="marriage_date">Date Of Marriage</label>
			<div class="col-lg-8">
				<input class="form-control required" id="marriage_date" name="marriage_date" type="date" value="{{old('marriage_date')}}" >
			</div>
		</div>
	</section>
	<h3>Address Info</h3>
	<section>
	    @include('marriage::Marriage.Forms.addressInfo')
	</section>
	@if(session('register')['status'] == 'father' || session('register')['status'] == 'son')
	<h3>Wife Family Info</h3>
	<section>
		<div class="widget widget-tabs widget-tabs-gray border-bottom-none">
        <!-- Widget heading -->
        <div class="widget-head">
            <strong class="lead">Did the wife family account created ? </strong>
            <button  class="active btn btn-primary"  href="#yes" data-toggle="tab">Yes</button>
            <button class="btn btn-warning" value="" href="#no" data-toggle="tab">No</button>
            <button class="btn btn-infor" value="" href="#why" data-toggle="tab">Why ?</button>
        </div>
        <!-- // Widget heading END -->
        <div class="widget-body">
            <div class="tab-content">
                <!-- Tab content -->
                <div class="tab-pane active" id="default">
                   <strong>Please answer question above !</strong>
                </div>
                
                <div class="tab-pane" id="why">
                    <strong>We want to establish connection between the wife family and husband family enable us to easely pass information from one family to another like invetation.  
                    </strong>
                </div>

                <div class="tab-pane" id="no">
                    <strong>We assume that this wife's parent doesn't have family account if they have click <a  href="#yes" data-toggle="tab"><i></i>yes they have</a></li></strong>
                    <div class="form-group clearfix">
                        <label class="col-lg-4 control-label " for="name">Wife Date Of Birth</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ old('wife_date') }}" id="name" name="wife_date" type="date">
                        </div>
                    </div>
                </div>

                <!--wife family tab-->
                <div class="tab-pane" id="yes">
                     <div class="form-group clearfix">
                        <label class="col-lg-4 control-label " for="name">Wife Email</label>
                        <div class="col-lg-8">
                            <input placeholder="Wife Familt E-mail Address" class="form-control" value="{{ old('wife_email') }}" id="name" name="wife_email" type="email">
                        </div>
                    </div>
                </div>
                <!-- end wife family tab-->
            </div>
        </div>
    </div>
	</section>
	@endif
	<h3>Be Notify</h3>
	<section>
		<div class="form-group clearfix">
			<div class="col-lg-12">
				<div class="checkbox checkbox-primary">
					<input id="checkbox-v" type="checkbox">
					<label for="checkbox-v"> I agree with the Terms and Conditions. </label>
					<input type="submit" value="Register" class="btn btn-primary">
				</div>
			</div>
		</div>
	</section>
</form>
