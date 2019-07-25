<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if(empty($results))
            <h2 class="alert alert-success">Result not found</h2>
        @else 
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
       </table> 
       @endif
    </div>
</div>