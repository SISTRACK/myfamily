<?php

namespace App\Http\Controllers\Blogs;

use Wink\Http\Controllers\PagesController;
// use Wink\WinkPage;
// use Wink\Http\Resources\PagesResource;
class BlogPagesController extends PagesController
{
	// public function index()
 //    {
 //        $entries = WinkPage::when(request()->has('search'), function ($q) {
 //            $q->where('title', 'LIKE', '%'.request('search').'%');
 //        })
 //            ->orderBy('created_at', 'DESC')
 //            ->paginate(30);
 //        return PagesResource::collection($entries);
 //    }
	public function posts()
	{
		return view('blog.posts');
	}
}