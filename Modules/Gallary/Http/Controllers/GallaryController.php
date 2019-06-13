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
     * store audio vedio or photo to their respective album.
     * @return Response
     */
    public function upload(Request $request)
    {
        $album = Album::find($request->album_id);
        $flag = null;
        switch ($album->albumContentType->name) {
            case 'Audio':
                $flag = 'Audio';
                $request->validate([
                    'file' => 'required|mimes:wav,mpeg,ogg',
                ]);
                break;
            case 'Vedio':
            $flag = 'Video';
                $request->validate([
                    'file' => 'required|mimes:avi,mpeg,quicktime,mp4'
                ]);
                break;
            default:
            $flag = 'Photo';
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,bmp,png,jpg',
                ]);
                break;
        }
        $file = $request->file('file');
        $filename = time().$file->getClientOriginalName();
        $album_type_folder = $album->albumContentType->name;
        $file->move("assets/Gallary/$album_type_folder/$album->name/",$filename);
        switch ($flag) {
            case 'Audio':
                $album->audios()->create(['audio'=>$filename,'title'=>$request->title,'description'=>$request->description,'published'=>$request->published]);
                break;
            case 'Video':
                $album->videos()->create(['video'=>$filename,'title'=>$request->title,'description'=>$request->description,'published'=>$request->published]);
                break;
            
            case 'Photo':
                $album->photos()->create(['photo'=>$filename,'title'=>$request->title,'description'=>$request->description,'published'=>$request->published]);
                break;
            default:
                # code...
                break;
        }
        
        session()->flash('message',$flag.' was added successfully to '.$album->getName().' Album');
        return back();
    } 
}
