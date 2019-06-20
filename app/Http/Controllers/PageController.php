<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;
use Modules\Core\Services\Traits\UploadFile;

class PageController extends Controller
{
	use UploadFile;
    public function viewPages()
    {

    	return view('Pages.index',['pages'=>Page::all()]);
    }

    public function createPage(Request $request)
    {
    	Page::firstOrCreate(['page'=>$request->page]);
    	return back()->with('message','Page created successfully');
    }

    public function updatePage(Request $request)
    {

    	$valid = [
            'description' => 'required'
    	];
    	if($request->has('file')){
    		$valid['file'] = 'required|image|mimes:jpeg,bmp,png,jpg';
    	}

    	$request->validate($valid);
    	$page = Page::find($request->page);
    	$image = null;
        if($request->file){
        	$image = $this->storeFile($request->file,'Nfamily/Pages/Images');
        }
        $page->pageImages()->create(['description'=>$request->description,'image'=>$image]);
        return back()->with('message','Page created successfully');
    	
    }
    public function view($slug,$page_id)
    {
    	return view('Pages.page',['page'=>Page::find($page_id)]);
    }
}
