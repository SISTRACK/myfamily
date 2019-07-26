@extends('admin::layouts.master')

@section('page-title')
{{Breadcrumbs::render('admin.search.identity.profiles',session('profiles'))}}
@endsection

@section('page-content')
@if(empty($profiles))
    <div class="alert alert-success">
        Result not found
    </div>
@else
@foreach($profiles as $profile)
    <div class="col-md-8 col-md-offset-2"><br /><br />
        <div class="panel pane-deafault">
        <div class="panel-body">
                <div class="row">
                <div class="col-md-3">
                <img height="160" weight="160" src="{{$profile->profileImageLocation('display').$profile->image->name}}" alt="">
                </div>
                    <div class="col-md-7 col-md-offset-2">
                        <table>
                            <tr>
                                <td>Name : </td>
                                <td>{{$profile['user']->first_name.' '.$profile['user']->last_name}}</td>
                            </tr>
                           
                            <tr>
                                <td width="120">Marrital Status : </td>
                                <td>{{$profile->maritalStatus->name}}</td>
                            </tr>
                            <tr>
                                <td width="120">Gender : </td>
                                <td>{{$profile->gender->name}}</td>
                            </tr>
                            <tr>
                                <td width="120">Date Of Birth : </td>
                                <td>{{date('d/m/Y',$profile->date_of_birth)}}</td>
                            </tr>
                            <tr>
                                <td width="120">Number Of Wives : </td>
                                <td>{{ count($profile->numberOfWives())}}</td>
                            </tr>
                            <tr>
                                <td>Birth : </td>
                                <td>{{count($profile->numberOfBirths())}}</td>
                            </tr>
                            
                            <tr>
                                <td>Family : </td>
                                <td>{{$profile->thisProfileFamily()->name}}</td>
                            </tr>
                            <tr>
                                <td>Local Government</td>
                                <td>{{$profile->address()['lga']}}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{$profile->address()['district']}}</td>
                            </tr>
                            <tr>
                                <td>Town/Village : </td>
                                <td>{{$profile->address()['town']}}</td>
                            </tr>
                                <form method="post" action="{{route('admin.search.identity.generation.index',strtolower($profile->user->first_name.'-'.$profile->user->last_name))}}" >
                                    {{csrf_field()}}
                                    <tr>
                                        <td width="200">
                                            <input type="hidden" name="profile_id" value="{{$profile->id}}">
                                        </td>
                                        <td>
                                            <input type="submit" value="Get Generation" class="form-control btn btn-primary btn-block"/>
                                        </td>
                                    </tr>
                                </form>
                        </table>
                    </div>
                </div>
                <br>
                
            </div>
        </div>
    </div>
    @endforeach
@endif
@endsection