@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h1>NFamilyPlus Posts</h1>
        <hr />
        @foreach ($posts as $post)
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
          <p>
            <button class="btn btn-primary" href="{{route('posts.show',$post->id)}}">Comment</button>
          </p>
          <hr />
        @endforeach
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8"><a href="{{ route('posts.create') }}" class="btn btn-primary pull-right" style="margin-top:15px;">{{'+'}}</a></div>
    </div>
    <div class="text-center">
      {{ $posts->links() }}
    </div>

  </div>
@endsection
