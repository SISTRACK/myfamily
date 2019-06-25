@extends('layouts.welcome')
@section('title')
{{'Nigerin Family information system sign up'}}
@stop
@section('content')
<div class="wrapper-page">

    <div class="m-t-40 account-pages">
        <div class="text-center account-logo-box">
            
                <h2 class="text-uppercase" style="color: white;">
                sign up here
                </h2>
            
            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
        </div>
        <div class="account-content">
            <form class="form-horizontal" action="{{route('register')}}" method="post">
                 @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name">
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required placeholder="Second Name">
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-success">
                            <input id="checkbox-signup" type="checkbox" checked="checked">
                            <label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>

                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-xs-12">
                        <button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>

            </form>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- end card-box-->


    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have account?<a href="{{route('login')}}" class="text-primary m-l-5"><b>Sign In</b></a></p>
        </div>
    </div>

</div>
@endsection
