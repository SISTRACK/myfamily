@extends('divorce::layouts.master')
@section('page-title')
{{'Divorece registration page'}}
@endsection

@section('page-content')
    <div class="row">
    	@foreach($husband->marriages as $marriage)
        <div class="col-lg-3 col-md-4">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class=" member-thumb m-b-10 center-block">
                        <img src="assets/images/users/{{$marriage->wife->profile->image->name}}" class="img-circle" height="140" width="i40">
                    </div>
                    <div class="text-left">
                        <p class="text-muted font-13"><strong>Name :</strong><span class="m-l-15">{{$marriage->wife->profile->user->first_name.' '.$marriage->wife->profile->user->last_name}}</span></p>
                        <p class="text-muted font-13"><strong>E-mail :</strong><span class="m-l-15">{{$marriage->wife->profile->user->email}}</span></p>
                        <p class="text-muted font-13"><strong>Phone :</strong><span class="m-l-15">{{$marriage->wife->profile->user->phone}}</span></p> 
                        <p class="text-muted font-13"><strong>Status :</strong><span class="m-l-15">{{$marriage->wife->status->name}}</span></p>
                        @if($marriage->divorce != null)
                            <p class="text-muted font-13"><strong>Divorce Count :</strong><span class="m-l-15 btn btn-danger">
                            {{$marriage->divorce->counter}}
                            </span></p>
                        @endif
                        <p class="text-muted font-13"><strong>Births :</strong><span class="m-l-15 btn btn-primary">
                        {{count($marriage->wife->profile->numberOfBirths())}}
                        </span></p>
                        <p class="text-muted font-13"><strong>Marriage Status :</strong><span class="m-l-15">{{$marriage->is_active == 1  ? 'Active ' : 'Divorced '}}</span></p>

                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
        @endforeach
    </div>
@endsection