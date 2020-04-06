
    <div class="tab-pane" id="admit">
    	<h2 class="text-primary">New Amission</h2>
        <form action="{{route('education.school.admission.register',[request()->route('year')])}}" method="post">
        	@csrf
        	<input type="hidden" name="fid" value="{{$user->profile->FID}}" class="form-control"><br>
        	<input type="text" name="admission_no" placeholder="Admission No" class="form-control"><br>
            <select class="form-control" name="year">
                <option value="">Select Year</option>
                @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>
                @endforeach
            </select><br>
            <button class="btn btn-primary">Give Admission</button>
         </form>
    </div>
