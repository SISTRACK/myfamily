@extends('certificate::layouts.master')

@section('page-title')
    {{'Birth certificate'}}
@stop
@section('page-content')
    <div class="col-sm-8 col-sm-offset-2"><br /><br />
        <div class="panel pane-deafault">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 center">
                        <img height="100"src="assets/images/users/male.png" alt="">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12 h3 center">
                        KEBBI STATE OF NIGERIA
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12 h2 center">
                        BAGUDO LOCAL GOVERNMENT
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12 h1 center">
                        BIRTH CERTIFICATE
                    </div>
                </div> <br> <br>

                <div class="row">
                     <div class="col-sm-12 h4">
                            <table>
                        <tr height="30">
                            <td width="300">Father's Name</td>
                            <td>{{'father name'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Mother's Name</td>
                            <td>{{'mother name'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Child's Name</td>
                            <td>{{'Name'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Sex</td>
                            <td>{{'gender'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Date Of Birth</td>
                            <td>{{'date'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Time Of Birth</td>
                            <td>{{'Time'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Place Of Birth</td>
                            <td>{{'Bagudo'}}</td>
                        </tr>
                        <tr height="30">
                            <td>Delivered At</td>
                            <td>Home</td>
                        </tr>
                        <tr height="30">
                            <td>Delivered By</td>
                            <td>Malam Fatima</td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

