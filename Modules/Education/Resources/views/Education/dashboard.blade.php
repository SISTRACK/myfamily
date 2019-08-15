@extends('education::layouts.master')

@section('page-content')
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Graduates Since Established</p>
            <h2>{{count($teacher->graduatedSinceEstablished())}}</h2>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Graduates in {{date('Y')}}</p>
            <h2>{{count($teacher->graduatedThisYear())}}</h2>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Admitted Since Established</p>
            <h2>{{count($teacher->admittedSinceEstablished())}}</h2>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Admitted in {{date('Y')}}</p>
            <h2>{{count($teacher->admittedThisYear())}}</h2>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Report since established</p>
            <h2>{{count($teacher->reportedSinceEstablished())}}</h2>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Report in {{date('Y')}}</p>
            <h2>{{count($teacher->reportedThisYear())}}</h2>
        </div>
    </div>
</div>
@endsection


