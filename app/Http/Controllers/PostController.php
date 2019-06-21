<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Modules\Core\Services\Traits\UploadFile;

class PostController extends Controller
{
    use UploadFile;

    public function __construct()
    {
      $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::paginate(25);
      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validate_this = [
        'title' => 'required|max:255',
        'content' => 'required',
      ];
      if($request->has('file')){
        $validate_this['file'] = 'required|image|mimes:jpeg,bmp,png,jpg';
      } 
      
      $this->validate($request, $validate_this);
      $user = Auth::user();
      $post = $user->posts()->create([
        'title' => $request->title,
        'content' => $request->content,
        'published' => $request->has('published'),
      ]);
      if($request->has('file')){
        $file = $this->storeFile($request->file, 'Nfamily/Post/Images');
        $post->update(['image'=>$file]);
      }
      return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validate_this = [
        'title' => 'required|max:255',
        'content' => 'required',
      ];
      if($request->has('file')){
        $validate_this['file'] = 'required|image|mimes:jpeg,bmp,png,jpg';
      } 
      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->published = ($request->has('published') ? true : false);
      if($request->has('file')){
        if($post->image){
          $this->deleteFile('Nfamily/Post/Images/'.$post->image);
        }
        $file = $this->storeFile($request->file, 'Nfamily/Post/Images');
        $post->image = $file;
      }

      $post->save();

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::destroy($id);
    }
}

