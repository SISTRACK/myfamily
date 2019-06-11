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
        return view('gallary::private.photo',['profile'=>$this->profile()]);
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


    
}
