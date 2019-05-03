@section('page-title')
   {{'System Dashboard'}}
@endsection    

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