
<div class="row">
    <div class="col-md-3">
        <strong>Personnel Details</strong>
    </div>
</div> 
<hr>
<div class="row">
    Biography<br />
    <textarea readonly name="about"id="mustHaveId" class="wysihtml5 form-control" rows="5">{{$user->profile->about_me}}</textarea>
</div>
<hr>

<div class="row">
    @include('profile::Forms.Detail.personal_detail')  
</div> 
<hr>
<div class="row">
    <div class="col-md-3">
            <strong class="h4">Home Address Details</strong>
    </div>
</div> 
<div class="row">
    @include('profile::Forms.Detail.home_address')
</div> 
<hr>

<div class="row">
    <div class="col-md-3">
        <strong>Work Address Details</strong>
    </div>
</div> 
<div class="row">
    @include('profile::Forms.Detail.work_address')
</div> 
<hr>

<div class="row">
    <div class="col-md-3">
            <strong>Contact Details</strong>
    </div>
</div> 
<hr>
<div class="row">
    @include('admin::Configuration.Profile.Forms.Detail.contact_detail')
</div>