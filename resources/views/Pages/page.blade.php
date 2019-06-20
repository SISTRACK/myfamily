@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(session('message'))
	        <div class="alert alert->success">{{session('message')}}</div>
	    	@endif
		    
		    <h1 style="style: none">{{$page->page}} Page</a></h1>
		    
		    @foreach($page->pageImages as $pageImage)
		    
			 <div><img width="800" height="400" class="img img-responsive" src="{{storage_url($pageImage->image)}}"></div>
			 <div class="strong h4">{{$pageImage->description}}</div>
		    @endforeach
		    
			<button data-toggle="modal" data-target="#update_page" class="btn btn-primary">{{'+'}}</button>
			<!-- modal -->
			<div class="modal fade" id="update_page" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			        <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <div class="modal-body">
			            <form method="post" action="/blog/page/{{$page->slug()}}/{{$page->id}}/update" enctype="multipart/form-data">
			                @csrf
			                <input type="hidden" name="page" value="{{$page->id}}">
			                <input type="file" name="file" class="form-control" value="Attach">
			                <br>
	                        <textarea name="description" rows="5" class="form-control"></textarea><br>
			                <button class="btn btn-primary">Update Page</button>
			            </form>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			</div>
			<!-- end modal --> 
        </div>
	</div>
</div>
@endsection
