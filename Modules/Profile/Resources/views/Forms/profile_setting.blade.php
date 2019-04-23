@extends('profile::layouts.master')
@section('page-title')
    {{$user->first_name.' '.$user->last_name}}{{"'s Profile"}}
@endsection
@section('page-content')

<!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class=" member-thumb m-b-10 center-block">
                                <img src="assets/images/users/{{$user->profile->image->name}}" class="img-radius" height="250" width="200">
                            </div>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$user->phone}}</span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$user->email}}</span></p>
                            </div>

                        </div>

                    </div> <!-- end card-box -->

                </div> <!-- end col -->
                
                <div class="col-md-8 col-lg-9">
                	<div class="widget widget-tabs widget-tabs-gray border-bottom-none">
                        <div class="widget-head">
                           
                                <a class="btn btn-primary active" href="#account-details" data-toggle="tab">Profile Details</a>
                                <a class="btn btn-success  settings" href="#account-settings" data-toggle="tab">Profile Settings</a>
                            
                        </div>
                        <!-- // Widget heading END -->
                        
                        <div class="widget-body">
                            
                            <div class="tab-content">
                            
                                <div class="tab-pane" id="account-details">
                                    @include('profile::Forms.Detail.account_detail')
                                </div>
                                    
                                <div class="tab-pane active" id="account-settings">
                                    @include('profile::Forms.Setting.account_setting')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Widget END -->

                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection
