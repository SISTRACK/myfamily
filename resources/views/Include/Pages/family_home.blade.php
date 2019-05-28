@section('page-title')
   {{'Family Member Dashboard'}}
@endsection    

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number Of availavle registerd event">Available Events</p>
            <h2>loading... <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total number of People within your own family">Total Family Members</p>
            <h2>{{$profile->totalFamilyMembers()}}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
@if($profile->gender->name == 'Male')
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Your Total number of wives">Wives</p>
            <h2> {{$profile->numberOfWives()}} <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
@endif
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of birthin your family ">Births</p>
            <h2> {{$profile->numberOfBirths()}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Numbers of bit=rth alive">Live Birth</p>
            <h2> {{$profile->numberOfLiveBirths()}}  <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of birth that dieds">Death Birth</p>
            <h2> {{$profile->numberOfDeathBirths()}}  <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of marriages you have">Marriages</p>
            <h2>{{$profile->numberOfMarriages()}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
@if($profile->gender->name == 'Male')
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of Divorce you do">Divorces</p>
            <h2>{{$profile->numberOfDivorces()}}  <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
@endif
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of your sons that married">Married Sons</p>
            <h2>{{$profile->numberOfMarriedSons()}} <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="mdi mdi-account-convert widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of your daughters that married">Married Daughters</p>
            <h2> {{$profile->numberOfMarriedDaughters()}}  <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
        </div>
    </div>
</div><!-- end col -->
                