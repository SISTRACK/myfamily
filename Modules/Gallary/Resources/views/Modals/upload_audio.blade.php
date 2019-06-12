

<!-- modal -->
<div class="modal fade" id="album_{{$album->id}}" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('upload.audio')}}">
                @csrf
                <input type="hidden" name="album_id" value="{{$album->id}}">
                <input type="file" name="file" class="form-control" placeholder="album title">
                <br>
                <button class="btn btn-primary">Add Audio</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- end modal -->