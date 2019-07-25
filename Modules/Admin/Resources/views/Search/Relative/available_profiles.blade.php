@extends('admin::layouts.master')

@section('page-tittle')

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
                                <td width="120">Number Of Wives : </td>
                                <td>{{ count($profile->numberOfWives())}}</td>
                            </tr>
                            <tr>
                                <td>Birth : </td>
                                <td>{{count($profile->numberOfBirths())}}</td>
                            </tr>
                            
                            <tr>
                                <td>Family : </td>
                                <td>{{$profile->family->name}}</td>
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
                                <form method="post" action="{{route('admin.search.relative')}}" >
                                    {{csrf_field()}}
                                    <tr>
                                        <td width="200">
                                            <select name="type" id="" class="form-control">
                                            <option value="">Search For</option>
                                            @if($profile->child)
                                            <option value="Aunty">Aunties</option>
                                            <option value="Brother">Brothers</option>
                                            @endif
                                            @if($profile->husband && $profile->husband->father)
                                            <option value="Children">Children</option>
                                            @endif
                                            @if($profile->wife)
                                            <option value="Husband">Husband</option>
                                            @endif
                                            @if($profile->child)
                                            <option value="Father">Fathers</option>
                                            <option value="Grandfather">GrandFathers</option>
                                            <option value="Grandmother">GrandMothers</option>
                                            <option value="Mother">Mothers</option>
                                            <option value="Uncle">Uncles</option>
                                            @endif
                                            @if($profile->husband)
                                            <option value="Wife">Wives</option>
                                            @endif

                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" value="Get Relatives" class="form-control btn btn-primary btn-block"/>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="profile_id" value="{{$profile->id}}">
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