@extends('layouts.welcome')
@section('title')
{{'Nigerian family information system login page'}}
@endsection
@section('content')
<div class="wrapper-page">
    <div class="m-t-40 account-pages">
        <div class="text-center account-logo-box">
            <h2 class="text-uppercase" style="color: white;">
                admin login
            </h2>
            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
        </div>
        <div class="account-content">
            <form class="form-horizontal" action="{{route('admin.login')}}" method="post">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" required="" placeholder="E-Mail address">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-success">
                            <input id="checkbox-signup" type="checkbox" checked>
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-sm-12">
                        <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>

                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-xs-12">
                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

            </form>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- end card-box-->


    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Don't have an account? <a href="{{route('register')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
        </div>
    </div>
@endsection
