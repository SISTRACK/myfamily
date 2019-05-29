@section('page-title')
   {{'System Dashboard'}}
@endsection    

<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#users">
        <div class="card-box widget-box-one">
            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
            <div class="wigdet-one-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Sign Up</p>
                <h2>{{count($users)}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
            </div>
        </div>
    </a>
    <!-- modal -->
        <div class="modal fade" id="users" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{'First Name'}}</th>
                                    <th>{{'Second Name'}}</th>
                                    <th>{{'E-mail Address'}}</th>
                                    <th>{{'Phone Number'}}</th>
                                    <th>{{'Status'}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    @if($user->id != Auth()->User()->id)
                                    <tr>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->profile != null ? 'Family Member' : 'Just Sign Up'}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- end modal -->
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Families</p>
            <h2>{{count($families)}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
        </div>
    </div>
</div><!-- end col -->


<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Marriages</p>
            <h2>{{count($marriages)}}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 1250</p>
        </div>
    </div>
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-layers widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Births</p>
            <h2>{{count($births)}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 40.33k</p>
        </div>
    </div>
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-av-timer widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Deaths</p>
            <h2>{{count($deaths)}}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 956</p>
        </div>
    </div>
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-download widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Divorces</p>
            <h2>{{count($divorces)}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 50k</p>
        </div>
    </div>
</div><!-- end col -->
                

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-download widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Return Divorces</p>
            <h2>{{count($returns)}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
            <p class="text-muted m-0"><b>Last:</b> 50k</p>
        </div>
    </div>
</div>                