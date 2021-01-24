<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="col-md-1"></div>
<div class="col-md-10">
    <div class="row">
        @foreach(users() as $user)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card-box widget-box-one">
                <i class="mdi mdi-account-convert widget-one-icon"></i>
                <div class="wigdet-one-content">
                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">{{$user['name']}}</p>
                    <h2>{{$user['count']}} <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                </div>
            </div>
        </div><!-- end col -->
        @endforeach
    </div>
</div>
<!-- end row -->