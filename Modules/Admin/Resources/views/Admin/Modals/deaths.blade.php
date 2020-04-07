<!-- modal -->
<div class="modal fade" id="deaths" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<a class="btn btn-success" href="{{route('district.deaths.create',[$district->lga->state->name,$district->lga->name,$district->name,$district->id])}}">New Death</a>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	@if(empty($district->deaths()))
                    <h3>{{'Deaths record not found in '.$district->name.' District'}}</h3>
                @else
                <div class="row">
                	<div class="col-xs-12">
                		<table class="table">
		                    <thead>
		                        <tr>
		                            <th>{{'Name'}}</th>
		                            <th>{{'Family'}}</th>
		                            <th>{{'Town'}}</th>
		                            <th>{{'Date'}}</th>
		                            <th>{{'Place'}}</th>
		                            <th>{{'Wives'}}</th>
		                            <th>{{'Children'}}</th>
		                            <th></th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($district->deaths() as $death)
		                            
		                            <tr>
		                                <td>
		                                	{{$death->profile->user->first_name}} {{$death->profile->user->last_name}}
		                                </td>
		                                <td>
		                                	{{$death->profile->family->name}} 
		                                </td>
		                                <td>
		                                	{{$death->profile->family->location->area->town->name}} 
		                                </td>
		                                <td>
		                                	{{date('d/M/Y',$death->date)}}
		                                </td>
		                                <td>{{$death->place}}</td>
		                                <td>{{count($death->profile->numberOfWives())}}</td>
		                                <td>{{count($death->profile->numberOfBirths())}}</td>
		                                <td>
		                                    <a href="{{route('district.family.death.edit',[$district->lga->state->name,$district->lga->name,$district->name,$death->profile->family->name,$death->id])}}" class="btn btn-warning">Edit</a>
		                              
		                                </td>
		                            </tr>
		                           
		                        @endforeach
		                    </tbody>
		                </table>
                	</div>
                </div>
                
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->