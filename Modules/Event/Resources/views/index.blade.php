@extends('event::layouts.master')

@section('page-title')
    {{'Available Family Event'}}
@endsection

@section('page-content')
<div class="col-md-8 col-md-offset-2">
    <div class="widget">

        <div class="innerAll half bg-primary border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                <i class="fa fa-fw fa-calendar fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{'12/12/2019'}}</p>
                    <p class="strong margin-none">{{'Time: From 2:30am'}}  {{'To 4:00'}}</p>
                    <p class="strong margin-none">{{'20 days Remain To Event'}}</p>
                    <p class="strong margin-none">{{'Announcer : isah labbo'}}</p>
                    <p class="strong margin-none">{{'Family : Galbi'}}</p>
                </div>
            </div>
        </div>

        <div class="innerAll half bg-gray border-bottom">
            <div class="media innerAll half margin-none">
                <div class="pull-left">
                    <i class="fa fa-fw fa-map-marker fa-3x"></i>
                </div>
                <div class="media-body">
                    <p class="strong lead margin-none">{{'Marriage Event'}}</p>
                    <p class="strong margin-none">{{'Address :  No 31 Ali akilu road sokoto'}}</p>
                </div> 
            </div>
        </div>
        
        <div class="row"> <br>
            <div class="col-md-12 h4 text-center text-primary">
                    {{'the marriage of isah labbo and sumayya aliyu bagudo'}}
            </div>
        </div>
           
        <div class="innerAll text-center half">
            <div class="btn-group">
                <a href="#" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Attend</a>
                <a href="#"class="btn btn-default">I might go</a>
                </div>
        </div>
        
    </div>
    <div class="widget">
        <div class="innerAll half">
            <span class="badge badge-success">{{'1'}}</span> Attending
            <div class="innerAll half text-center">
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
            </div>
        </div>
    
        <div class="innerAll half">
            <span class="badge badge-warning">{{'4'}}</span> Might Go
            <div class="innerAll half text-center">
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>
                <a href="#" class="border-none">
                    <img src="assets/images/users/male.png" alt="photo" width="35" class="innerB half">
                </a>	
            </div>
        </div>
    </div>
</div>
@stop
