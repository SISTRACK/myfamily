<?php

namespace App\Http\Controllers;
use App\Page;
use App\PageImage;
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

    public function updatePageContent(Request $request)
    {

        $valid = [
            'description' => 'required'
        ];
        if($request->has('file')){
            $valid['file'] = 'required|image|mimes:jpeg,bmp,png,jpg';
        }

        $request->validate($valid);
        $page_image = PageImage::find($request->page_image);
        $image = null;
        if($request->file){
            $this->deleteFile('Nfamily/Pages/Images/'.$page_image->image);
            $image = $this->storeFile($request->file,'Nfamily/Pages/Images');
        }
        $page_image->update(['description'=>$request->description,'image'=>$image]);
        return back()->with('message','Page content update successfully');
        
    }
    public function view($slug,$page_id)
    {
    	return view('Pages.page',['page'=>Page::find($page_id)]);
    }
}
