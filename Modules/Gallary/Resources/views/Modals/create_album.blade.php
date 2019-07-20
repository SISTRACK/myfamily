

<!-- modal -->
<div class="modal fade" id="create_album" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('album.create',[profile()->thisProfileFamily()->name])}}">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="album title">
                <br>
                <select name="album_type_id" class="form-control">
                    <option value="">Album Type</option>
                    @if(session('album_types'))
                        @foreach(session('album_types') as $album_type)
                            <option value="{{$album_type->id}}">{{$album_type->name}}</option>
                        @endforeach
                    @endif
                </select>
                <br>
                <select name="album_content_type_id" class="form-control">
                    <option value="">Album Content Type</option>
                    @if(session('album_contents'))
                        @foreach(session('album_contents') as $album_content)
                            <option value="{{$album_content->id}}">{{$album_content->name}}</option>
                        @endforeach
                    @endif
                </select>
                <br>
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- end modal -->