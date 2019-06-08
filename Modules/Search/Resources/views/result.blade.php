@extends('search::layouts.master')

@section('page-title')
    {{'Relative search result '}}
@stop
@section('page-content')
    
@if(!session('search'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="text-primary">Search Form</h3><hr>     
        <form method="post" action="{{route('search.store')}}" >
        @csrf
            <label for="">Third Party User Name</label>
            <input type="text" class="form-control" placeholder="example@family.com" name="user">
            <label for=""></label>
            <input type="submit" name="search" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="text-primary">Result Found</h3><hr>     
       <table class="table table-default">
           <thead>
               <tr>
                   <th>{{'Image'}}</th>
                   <th>{{'First Name'}}</th>
                   <th>{{'Last Name'}}</th>
                   <th>{{'Email'}}</th>
                   <th>{{'Phone'}}</th>
               </tr>
           </thead>
       </table> 
    </div>
</div>
@endif

@stop
@section('footer')

@stop