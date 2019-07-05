@extends('government::layouts.master')

@section('page-content')
@if($user->state)
    <h3>
    	{{strtoupper($user->state->name.'/State Dashboard')}}
    </h3>
@elseif($user->lga)
    <h3>
    	{{strtoupper($user->lga->state->name.'/'.$user->lga->name.'/local government Dashboard')}}
    </h3>
@else
    <h3>
    	{{strtoupper($user->district->lga->state->name.'/'.$user->district->lga->name.'/'.$user->district->name.'/District Dashboard')}}
    </h3>
@endif
@endsection
