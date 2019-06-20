@extends('search::layouts.master')

@section('page-title')
    {{'Relative search result '}}
@stop
@section('page-content')
    
@if(is_null($results))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="text-primary">Search Form</h3><hr>     
        <form method="post" action="search" >
        @csrf
            <label for="">Third Party E-mail Address Name</label>
            <input type="email" class="form-control" placeholder="example@family.com" name="email">
            <label for=""></label>
            <input type="submit" name="search" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         
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
           @if(empty($results))
                <h2>Result not found</h2>
           @else
           <tbody>
               @foreach($results as $result)
               <tr>
                   <td><a href="#" data-toggle="modal" data-target="#{{$result->id}}"><img width="35" height="35" src="{{$result->profileImageLocation('display').$result->image->name}}"></a>
                     @include('search::Modals.relative')
                   </td>
                   <td>{{$result->user->first_name}}</td>
                   <td>{{$result->user->last_name}}</td>
                   <td>{{$result->user->email}}</td>
                   <td>{{$result->user->phone}}</td>
               </tr>
               @endforeach
           </tbody>
           @endif
       </table> 
    </div>
</div>
@endif

@stop
@section('footer')

@stop