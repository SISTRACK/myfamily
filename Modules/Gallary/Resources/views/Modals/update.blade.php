
<!-- modal -->
<div class="modal fade" id="update_{{strtolower($data['type']).'_'.$data['object']->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" action="gallary/album/{{strtolower($album->albumContentType->name)}}/info-update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$data['object']->id}}">
                <input type="hidden" name="type" value="{{$data['type']}}">
                <input type="text" name="title" value="{{$data['object']->title}}" class="form-control"><br>
                <textarea class="form-control" name="description">{{$data['object']->description}}</textarea><br>
                <label>Published:
                 <input type="checkbox" name="published" class="form-control"></label>
                <br>
                <button class="btn btn-primary">Update {{$data['type']}} Info</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- end modal -->