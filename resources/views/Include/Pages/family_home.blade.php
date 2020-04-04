@section('page-title')
   {{'Family Member Dashboard'}}
@endsection    

<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="card-box widget-box-one">
        <i class="fa fa-users widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number Of availavle registerd event">Available Events</p>
            <h2>loading...</h2>
        </div>
    </div>
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#users">
        <div class="card-box widget-box-one">
            <i class="fa fa-users widget-one-icon"></i>
            <div class="wigdet-one-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total number of People within your own family">Total Family Members</p>
                <h2>{{count($profile->totalFamilyMembers())}}</h2>
            </div>
        </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="users" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @foreach($profile->totalFamilyMembers() as $user)
                        
                        <div class="row">
                            <div class="col-sm-4">
                                @if($user->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$user->first_name.' '.$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    @if($user->profile->isFather())
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Father'}}</td>
                                    </tr>
                                    @elseif($user->profile->isMother())
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Mother'}}</td>
                                    </tr>
                                    @elseif(!is_null($user->profile->husband))
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Husband'}}</td>
                                    </tr>
                                    @elseif(!is_null($user->profile->wife))
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Wife'}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Child'}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
@if($profile->gender->name == 'Male')
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#wives">
    <div class="card-box widget-box-one">
        <i class="fa fa-female widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Your Total number of wives">Wives</p>
            <h2> {{count($profile->numberOfWives())}}</h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="wives" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfWives()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfWives() as $marriage)
                       <?php $user = $marriage->wife->profile->user; ?>
                        <div class="row">
                            <div class="col-sm-4">
                                @if($user->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$user->first_name.' '.$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Life Status </td>
                                        <td>{{$user->profile->life_status_id == 1 ? 'A life' : 'Death'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status </td>
                                        <td>{{$user->profile->maritalStatus->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Married At </td>
                                        <td>{{date('D:M:Y',$marriage->date)}}</td>
                                    </tr>
                                    @if($user->profile->isMother())
                                    <tr>
                                        <td>Births </td>
                                        <td>{{count($user->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
@endif
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#births">
    <div class="card-box widget-box-one">
        <i class="fa fa-child widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of birthin your family ">Births</p>
            <h2> {{count($profile->numberOfBirths())}}</h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="births" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfBirths()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfBirths() as $birth)
                       
                        <div class="row">
                            <div class="col-sm-4">
                                @if($birth->child->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$birth->child->profile->user->first_name.' '.$birth->child->profile->user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$birth->child->profile->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$birth->child->profile->user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td>{{$birth->child->profile->gender->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status </td>
                                        <td>{{$birth->child->profile->maritalStatus->name}}</td>
                                    </tr>
                                    <tr>
                                        <td width="150">Date Of Birth </td>
                                        <td>{{date('D:M:Y',$birth->child->profile->date_of_birth)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Place Of Birth </td>
                                        <td>{{$birth->place}}</td>
                                    </tr>
                                    <tr>
                                        <td>Deliver At </td>
                                        <td>{{$birth->deliver_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Deliver By </td>
                                        <td>{{$birth->deliver->first_name.' '.$birth->deliver->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Life Status </td>
                                        <td>{{$birth->child->profile->life_status_id == 1 ? 'A life' : 'Death'}}</td>
                                    </tr>
                                    @if($birth->child->profile->husband != null)
                                    <tr>
                                        <td>Births</td>
                                        <td>{{count($birth->child->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                       
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#live_births">
    <div class="card-box widget-box-one">
        <i class="fa fa-child widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Numbers of bit=rth alive">Live Birth</p>
            <h2> {{count($profile->numberOfLiveBirths())}} </h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="live_births" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfLiveBirths()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfLiveBirths() as $birth)
                       
                        <div class="row">
                            <div class="col-sm-4">
                                @if($birth->child->profile->image_id > 2)
                                    <img src="{{storage_url($birth->child->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($birth->child->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$birth->child->profile->user->first_name.' '.$birth->child->profile->user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$birth->child->profile->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$birth->child->profile->user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td>{{$birth->child->profile->gender->name}}</td>
                                    </tr>
                                    <tr>
                                        <td width="150">Date Of Birth </td>
                                        <td>{{date('D:M:Y',$birth->child->profile->date_of_birth)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Place Of Birth </td>
                                        <td>{{$birth->place}}</td>
                                    </tr>
                                    <tr>
                                        <td>Deliver At </td>
                                        <td>{{$birth->deliver_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Deliver By </td>
                                        <td>{{$birth->deliver->first_name.' '.$birth->deliver->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status </td>
                                        <td>{{$birth->child->profile->maritalStatus->name}}</td>
                                    </tr>
                                    @if($birth->child->profile->husband != null)
                                    <tr>
                                        <td>Births</td>
                                        <td>{{count($birth->child->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#death_births">
    <div class="card-box widget-box-one">
        <i class="fa fa-child widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of birth that dieds">Death Birth</p>
            <h2> {{count($profile->numberOfDeathBirths())}} </h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="death_births" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfDeathBirths()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfDeathBirths() as $birth)
                        <?php $user = $birth->child->profile->user; ?>
                        <div class="row">
                            <div class="col-sm-4">
                                @if($user->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$user->first_name.' '.$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td width="150">Burn On </td>
                                        <td>{{date('D:M:Y',$user->profile->date_of_birth)}}</td>
                                    </tr>
                                    @if($user->profile->isFather())
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Father'}}</td>
                                    </tr>
                                    @elseif($user->profile->isMother())
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Mother'}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>Status </td>
                                        <td>{{'Child'}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                       
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#marriages">
    <div class="card-box widget-box-one">
        <i class="fas fa-female widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of marriages you have">Marriages</p>
            <h2>{{count($profile->numberOfMarriages())}}</h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="marriages" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfMarriages()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfMarriages() as $marriage)
                       <?php $user = $marriage->wife->profile->user; ?>
                        <div class="row">
                            <div class="col-sm-4">
                                @if($user->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$user->first_name.' '.$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Life Status </td>
                                        <td>{{$user->profile->life_status_id == 1 ? 'A life' : 'Death'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status </td>
                                        <td>{{$user->profile->maritalStatus->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Married At </td>
                                        <td>{{date('D:M:Y',$marriage->date)}}</td>
                                    </tr>
                                    @if($user->profile->isMother())
                                    <tr>
                                        <td>Birth Status </td>
                                        <td>{{'Mother'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Births </td>
                                        <td>{{count($user->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
@if($profile->gender->name == 'Male')
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#divorces">
    <div class="card-box widget-box-one">
        <i class="fa fa-female widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of Divordivoce you do">Divorces</p>
            <h2>{{count($profile->numberOfDivorces())}} </h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="divorces" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfDivorces()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfDivorces() as $marriage)
                       <?php $user = $marriage->wife->profile->user; ?>
                        <div class="row">
                            <div class="col-sm-4">
                                @if($user->profile->image_id > 2)
                                    <img src="{{storage_url($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @else
                                    <img src="{{asset($user->profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$user->first_name.' '.$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Life Status </td>
                                        <td>{{$user->profile->life_status_id == 1 ? 'A life' : 'Death'}}</td>
                                    </tr>
                                    @if($marriage->divorce != null)
                                    <tr>
                                        <td width="150">Divorece Status </td>
                                        <td>{{$marriage->divorce->is_active == 1 ? 'Active' : 'Returned'}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td width="150">Divorece At </td>
                                        <td>{{date('D:M:Y',$marriage->divorce->date)}}</td>
                                    </tr>
                                    <tr>
                                        <td width="150">Divorece Count </td>
                                        <td class="btn btn-danger">{{$marriage->divorce->counter}}</td>
                                    </tr>
                                    <tr>
                                        <td>Married At </td>
                                        <td>{{date('D:M:Y',$marriage->date)}}</td>
                                    </tr>
                                    @if($user->profile->isMother())
                                    <tr>
                                        <td>Births </td>
                                        <td class="btn btn-primary">{{count($user->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
@endif
<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#married_sons">
    <div class="card-box widget-box-one">
        <i class="fa fa-male widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of your sons that married">Married Sons</p>
            <h2>{{count($profile->numberOfMarriedSons())}}</h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="married_sons" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfLiveBirths()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfLiveBirths() as $birth)
                       
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{$birth->child->profile->profileImageLocation('display').$birth->child->profile->image->name}}" alt="photo" width="150" class="innerB half">
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$birth->child->profile->user->first_name.' '.$birth->child->profile->user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$birth->child->profile->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$birth->child->profile->user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Family </td>
                                        <td>{{$birth->child->profile->family->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number Of Wives</td>
                                        <td class="btn btn-primary">{{count($birth->child->profile->numberOfWives())}}</td>
                                    </tr>
                                    @if($birth->child->profile->isFather())
                                    <tr>
                                        <td width="150">Births</td>
                                        <td>{{count($birth->child->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->

<div class="col-lg-4 col-md-6 col-sm-8">
    <a href="#"  data-toggle="modal" data-target="#married_daughters">
    <div class="card-box widget-box-one">
        <i class="fa fa-female widget-one-icon"></i>
        <div class="wigdet-one-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Number of your daughters that married">Married Daughters</p>
            <h2> {{count($profile->numberOfMarriedDaughters())}} </h2>
        </div>
    </div>
    </a>
    <!-- modal -->
    <div class="modal fade" id="married_daughters" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(empty($profile->numberOfMarriedDaughters()))
                        <h2>No record found</h2>
                    @endif
                    @foreach($profile->numberOfMarriedDaughters() as $birth)
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{$birth->child->profile->profileImageLocation('display').$birth->child->profile->image->name}}" alt="photo" width="150" class="innerB half">
                            </div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td> {{$birth->child->profile->user->first_name.' '.$birth->child->profile->user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Address </td>
                                        <td>{{$birth->child->profile->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number </td>
                                        <td>{{$birth->child->profile->user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td href="#" data-toggle="modal" data-target="#{{$birth->child->profile->id}}" class="btn btn-warning btn-block">{{'Husband'}}</td>
                                    </tr>
                                    @if($birth->child->profile->isMother())
                                    <tr>
                                        <td width="150">Births</td>
                                        <td>{{count($birth->child->profile->numberOfBirths())}}</td>
                                    </tr>
                                    @endif
                                </table>
                                
                            </div>
                        </div>
                        <hr>
                        
                        <!-- husband modal -->
                    <div class="modal fade" id="{{$birth->child->profile->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @foreach($birth->child->profile->wife->marriages as $marriage)
                                        <?php $husband_profile = $marriage->husband->profile; ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                            @if($husband_profile->image_id > 2)
                                                <img src="{{storage_url($husband_profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                            @else
                                                <img src="{{asset($husband_profile->profilePicture())}}" alt="photo" width="150" class="innerB half">
                                            @endif
                                            </div>
                                            <div class="col-sm-8">
                                                <table>
                                                    <tr>
                                                        <td>Name </td>
                                                        <td> {{$husband_profile->user->first_name.' '.$husband_profile->user->last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E-mail Address </td>
                                                        <td>{{$husband_profile->user->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number </td>
                                                        <td>{{$husband_profile->user->phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Family </td>
                                                        <td>{{$husband_profile->family->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number Of Wives</td>
                                                        <td class="btn btn-primary">{{count($husband_profile->numberOfWives())}}</td>
                                                    </tr>
                                                    @if($husband_profile->isFather())
                                                    <tr>
                                                        <td width="150">Births</td>
                                                        <td>{{count($husband_profile->numberOfBirths())}}</td>
                                                    </tr>
                                                    @endif
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                      
                                    @endforeach
                                        
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                    @endforeach
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div><!-- end col -->
                