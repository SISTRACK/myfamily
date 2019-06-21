@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h1>NFamilyPlus Posts</h1>
        <hr />
        @foreach ($posts as $post)
          @if(isAdmin())
          <a href="#" data-toggle="modal" data-target="#edit_post_{{$post->id}}"></a>
          @endif
          @if ($post->image)
            <div><img width="800" height="400" class="img img-responsive" src="{{storage_url('Nfamily/Post/Images/'.$post->image)}}"></div><br>
          @endif
          <h1>{{ $post->title }}</h1>
          {{ $post->updated_at->toFormattedDateString() }}
          @if ($post->published)
            <span class="label label-success" style="margin-left:15px;">Published</span>
          @else
            <span class="label label-default" style="margin-left:15px;">Draft</span>
          @endif
          <hr />
          <p class="lead">
            {{ $post->content }}
          </p>
          @if(isAdmin())
          </a>
          <!-- modal -->
      <div class="modal fade" id="edit_post_{{$post->id}}" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  @include('posts.edit')
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
      </div>
      <!-- end modal --> 
          <p>
            <button class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">Edit</button>
          </p>
          @else
          <p>
            <button class="btn btn-primary" href="{{route('posts.show',$post->id)}}">Comment</button>
          </p>
          @endif
          <hr />
        @endforeach
      </div>
    </div>
    @if(isAdmin())
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8"><a href="{{ route('posts.create') }}" class="btn btn-primary pull-right" style="margin-top:15px;">{{'+'}}</a></div>
    </div>
    @endif
    <div class="text-center">
      {{ $posts->links() }}
    </div>

  </div>
@endsection
