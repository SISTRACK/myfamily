<!-- modal -->
@if($profile_album != null)
<div class="modal fade" id="private_{{$profile_album->id}}" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    <form action="gallary/album/{{$profile_album->album->albumContentType->name}}/delete" method="post">
                        @csrf
                        <input type="hidden" name="album_id" value="{{$profile_album->album->id}}">
                        <button class="btn btn-primary btn-block">Delete Album</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <button  data-toggle="modal" data-target="#album_{{$album->id}}" class="btn btn-primary btn-block">New {{$profile_album->album->albumContentType->name}}
                    </button>
                    @include('gallary::Modals.upload')
                </div>
                <div class="col-sm-3">
                    <form action="gallary/album/{{strtolower($profile_album->album->albumContentType->name)}}/published" method="post">
                        @csrf
                        <input type="hidden" name="album_id" value="{{$profile_album->album->id}}">
                        <button class="btn btn-primary btn-block">Publish Album
                        </button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <button data-toggle="modal" data-target="#access_{{$album->id}}" class="btn btn-primary btn-block">Grant Access
                    </button>
                    @include('gallary::Modals.access')
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endif
<!-- end modal -->