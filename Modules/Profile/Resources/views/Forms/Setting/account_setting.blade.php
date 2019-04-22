    <div class="row">
        <div class="col-md-12">
            <strong>Update Biography</strong>
        </div>
    </div> 
    <hr>
    <div class="row">
        @include('profile::Forms.Setting.update_biography_form')
    </div>
    <hr> 
    <div class="row">
        <div class="col-md-12">
            <strong>Update Home Address</strong>
        </div>
    </div> 
    <hr>
    <div class="row">
        <div class="col-md-6">
            @include('profile::Forms.Setting.update_home_address_form')
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
                <strong>Update Business Address</strong>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-md-6">
            @include('profile::Forms.Setting.update_business_address_form')
        </div>
    </div>
    <hr>
    <div class="row">

        <!-- Column -->
        <div class="col-md-3">
            <strong>Update Your Health Information</strong>
            <p class="muted">You can update your helth information so that your relative know you current situation</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_health_form')
        </div>
    </div>
    <hr />
    <div class="row">

        <!-- Column -->
        <div class="col-md-3">
            <strong>Add New Business</strong>
            <p class="muted">You can add new business acquire to the list of the business you already have</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_business_form')
        </div>
    </div>
    <hr />
    <div class="row">

        <!-- Column -->
        <div class="col-md-3">
            <strong>Add New Work History</strong>
            <p class="muted">You can add new work history acquire to the list of the business you already have</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_work_history_form')
        </div>
    </div>
    <hr />

    <!-- Row -->
    <div class="row">

        <!-- Column -->
        <div class="col-md-3">
            <strong>Add New Experience</strong>
            <p class="muted">You can add new experience if any acquire to the list of the experience you already have.</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_experience_form')
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-3">
            <strong>Add New Expertice</strong>
            <p class="muted">You can add new working expertice if acquire to the list of the expertice you already have</p>
        </div>
        <!-- // Column END -->
        
        <!-- Column -->
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_expertice_form')
        </div>
    </div> <hr />

    <div class="row">
        <div class="col-md-3">
            <strong>Update Profile Picture</strong>
            <p class="muted">So many people may bear with <strong><{{$user->first_name.' '.$user->last_name}}</strong> You can make your profile identical by uploading the picture of your face</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.upload_profile_image_form')
        </div>
    </div>
    <hr>

    <div class="row">

        <!-- Column -->
        <div class="col-md-3">
            <strong>Add New Certificate</strong>
            <p class="muted">You can add new certificate acquired to the list of the certificate you already have</p>
        </div>
        <div class="col-md-9">
            @include('profile::Forms.Setting.new_certificate_form')
        </div>
    </div>
    <hr />

    <div class="separator line bottom"></div>
        
    <div class="row">
        <!-- Column -->
        <div class="col-md-3">
            <strong>Reset Profile Picture</strong>
            <p class="muted">If your profile picture look old or other reason that warant to change your profile picture you can do it here</p>
        </div>
        <!-- // Column END -->
        
        <!-- Column -->
        <div class="col-md-9">
            <div class="separator bottom"></div>
            <div class="form-actions" style="margin: 0;">
                <button name="add_skill" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Reset Picture</button>
            </div>
        </div>
    </div>
    <hr />
    <div class="separator line bottom"></div>

    <!-- Row -->
    <div class="row">
        <div class="col-md-3">
            <strong>Add Contact</strong>
            <p class="muted">We can help you save your contact details via Your family</p>
        </div>
        
        <div class="col-md-9">
            <div class="row">
                @include('profile::Forms.Setting.new_contact_form')
            </div>
        </div>
    </div>