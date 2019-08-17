<!-- modal -->
<div class="modal fade" id="{{'study_'.$graduate->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
  			    
  			    <h2 class="text-primary">hey {{$graduate->profile->user->first_name.' '.$graduate->profile->user->last_name}} is on study but he is expected to graduate in the next {{$graduate->remaininYearsToGraduate()}}  {{str_plural('Year',$graduate->remaininYearsToGraduate())}}</h2>
			      </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
