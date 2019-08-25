
<!-- modal -->
<div class="modal fade" id="verify_patient" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			    <h2 class="text-primary">View Patient Profile</h2>
		        <form action="{{route('health.doctor.patient.profile.verify')}}" method="post">
		        	@csrf
		            <input type="text" name="profile_id" class="form-control" placeholder ="Enter Patient Profile ID"><br>
		            <button class="btn btn-primary">Verify</button>
		        </form>
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
