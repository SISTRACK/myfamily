<?php

namespace Modules\Gallary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Gallary\Entities\Album;

class GallaryController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function privateIndex()
    {
        return view('gallary::private.index',['profile'=>$this->profile()]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function nuclearIndex()
    {
        return view('gallary::nuclear.photo',['profile'=>$this->profile()]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function extendedIndex()
    {
        return view('gallary::extended.photo',['profile'=>$this->profile()]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function createAlbum(Request $request, Album $album)

    { 
        $data = $request->all();
        $request['name'] = $request->name.'_'.time();
        $new_album = $album->create($request->all());
        switch ($data['album_type_id']) {
            case '1':
                $new_album->profileAlbums()->create(['profile_id'=>$this->profile()->id]);
                break;
            case '2':
                $new_album->familyAlbums()->create(['family_id'=>$this->profile()->family->id]);
                break;
            default:
                $new_album->familyAlbums()->create(['family_id'=>$this->profile()->family->root()->id]);
                break;
        }
        
        session()->flash('message','Album created successfully');
        return back();
    }

    /**
     * store the photo.
     * @return Response
     */
    public function uploadPhoto(Request $request)
    {
        dd($request->all());
    }

    /**
     * store vedio.
     * @return Response
     */
    public function uploadVedio(Request $request)
    {
        dd($request->all());
    }

    /**
     * store audio.
     * @return Response
     */
    public function uploadAudio(Request $request)
    {
       $album = Album::find($request->album_id);
       $album_owner = null;
       foreach ($album->profileAlbums as $owner) {
           $album_owner = $owner;
       }
       if(is_null($album_owner)){
            foreach ($album->familyAlbums as $owner) {
               $album_owner = $owner;
            }
            dd('this family album');
       }else{
    
           dd('this profile album');
       }
    }
    
}
