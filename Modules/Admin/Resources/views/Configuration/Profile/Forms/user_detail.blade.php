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
                                <img src="assets/images/users/avatar-1.jpg" class="img-radius" height="250" width="200">
                            </div>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{$user->first_name.' '.$user->last_name}}</span></p>
                                
                                <p class="text-muted font-13"><strong>Family :</strong> <span class="m-l-15">{{'Not available'}}</span></p>
                                
                                <p class="text-muted font-13"><strong>Father Name :</strong> <span class="m-l-15">{{'Not Available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mother Name :</strong> <span class="m-l-15">{{'Not available'}}</span></p>

                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$user->phone}}</span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$user->email}}</span></p>

                                <p class="text-muted font-13"><strong>Marriage :</strong> <span class="m-l-15">Not Available</span></p>

                                <p class="text-muted font-13"><strong>Birth :</strong> <span class="m-l-15">Not Available</span></p>
                            </div>

                        </div>

                    </div> <!-- end card-box -->

                </div> <!-- end col -->
                
                <div class="col-md-8 col-lg-9">
                	<div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 class="text-custom m-b-5">Biography</h4>
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">Lorem Ipsum is simply dummy text
		                            of the printing and typesetting industry. Lorem Ipsum has
		                            been the industry's standard dummy text ever since the
		                            1500s, when an unknown printer took a galley of type and
		                            scrambled it to make a type specimen book.
		                        </p>
		                    </div>
                		</div>
                	</div>
                
                    <div class="row">
                		<div class="col-md-8 col-sm-6">
                			<h4 class="text-custom m-b-5">Living Address</h4>
		                    <div class="p-t-10">
		                    	<p class="text-muted font-13">
		                    		<table>
		                    			<tr>
		                    				<td>Country</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>State</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Local Government</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Town / Village</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Area</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>House No</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>House Description</td>
		                    				<td></td>
		                    			</tr>
		                    		</table>
		                        </p>
		                    </div>
                		</div>
                	</div>

                    <h4 class="text-custom m-b-5">Expertise</h4>
                    <div class="row m-t-20">
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="p-t-10">
                                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round
                                       data-fgColor="#2abfcc" value="59" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                                <h6 class="text-muted m-t-10">Laravel</h6>
                            </div>
                        </div><!-- end col-->
                        <div class="col-md-3 col-sm-6 text-center">
                        	<div class="p-t-10">
                                <input data-plugin="knob" data-width="120" data-height="120" data-linecap=round
                                       data-fgColor="#2abfcc" value="40" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                                <h6 class="text-muted m-t-10">Vue js</h6>
                            </div>
                        </div>                                               
                    </div> <!-- end row -->
                    
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4>Work History</h4>

                            <div class=" p-t-10">
                                <p><b>2010-2015</b></p>

                                <p class="text-muted font-13 m-b-0">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. @ <a href="">{{'working place'}}</a>
                                </p>
                            </div>

                            <hr/>
                            <div class=" p-t-10">
                                <h5 class="text-custom m-b-5">Work Address</h5>

                                <p class="text-muted font-13 m-b-0">
                                	<table>
		                    			<tr>
		                    				<td>Country</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>State</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Local Government</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Town / Village</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Company / Organisation</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Office</td>
		                    				<td></td>
		                    			</tr>
		                    			<tr>
		                    				<td>Position</td>
		                    				<td></td>
		                    			</tr>
		                    		</table>
                                </p>
                            </div>

                        </div> <!-- end col -->

                    </div> <!-- end row -->
                
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h4>Experience</h4>

                            <div class=" p-t-10">
                                <h5 class="text-custom m-b-5">Lead designer / Developer</h5>
                                <p class="m-b-0">websitename.com</p>
                                <p><b>2010-2015</b></p>

                                <p class="text-muted font-13 m-b-0">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book.
                                </p>
                            </div>

                            <hr/>

                            <div class="">
                                <h5 class="text-custom m-b-5">Senior Graphic Designer</h5>
                                <p class="m-b-0">coderthemes.com</p>
                                <p><b>2007-2009</b></p>

                                <p class="text-muted font-13">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div>
                <div class="col-md-8 col-lg-9">
                    <h4 class="m-t-30">Recent Works</h4>
                    <div class="row">

                        <div class="col-md-4 col-sm-6">
                            <div class=" thumb">
                                <a href="#" class="image-popup" title="Screenshot-1">
                                    <img src="assets/images/shots/shot-1.png" class="thumb-img" alt="work-thumbnail">
                                </a>
                                <div class="gal-detail">
                                    <h4>Travel Guide</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class=" thumb">
                                <a href="#" title="Screenshot-2">
                                    <img src="assets/images/shots/shot-2.png" class="thumb-img" alt="work-thumbnail">
                                </a>
                                <div class="gal-detail">
                                    <h4>Interval timer (app concept)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection
