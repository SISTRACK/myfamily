

<!-- modal -->
<div class="modal fade" id="album_{{$profile_album->album->id}}" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('album.update',[profile()->thisProfileFamily()->name,$profile_album->album->albumContentType->name])}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="album_id" value="{{$profile_album->album->id}}">
                <input type="file" name="file" class="form-control" placeholder="album title">
                <br>
                <input type="text" name="title" placeholder="{{$profile_album->album->albumContentType->name}} Title"  class="form-control">
                <br>
                <textarea name="description" placeholder="{{$profile_album->album->albumContentType->name}} Descriptio"  class="form-control">
                	
                </textarea>
                <br>
                <input type="checkbox" name="published" class="form-control">
                <br>
                <button class="btn btn-primary">Add {{$profile_album->album->albumContentType->name}}</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- end modal -->