<!-- modal -->
@if($family_album != null)
<div class="modal fade" id="private_{{$family_album->id}}" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <button class="btn btn-primary">Delete this {{$family_album->album->albumContentType->name}} Album</button>
            
            <button  data-toggle="modal" data-target="#album_{{$album->id}}" class="btn btn-primary">New {{$family_album->album->albumContentType->name}}
            </button>
            @include('gallary::Modals.upload')
            <button class="btn btn-primary">Publish this {{$family_album->album->albumContentType->name}} Album</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endif
<!-- end modal -->