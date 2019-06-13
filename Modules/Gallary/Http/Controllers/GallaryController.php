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
        return view('gallary::nuclear.index',['profile'=>$this->profile()]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function extendedIndex()
    {
        return view('gallary::extended.index',['profile'=>$this->profile()]);
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
                $new_album->profileAlbum()->create(['profile_id'=>$this->profile()->id]);
                break;
            case '2':
                $new_album->familyAlbum()->create(['family_id'=>$this->profile()->family->id]);
                break;
            default:
                $new_album->familyAlbum()->create(['family_id'=>$this->profile()->family->root()->id]);
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
                // $request->validate([
                //     'file' => 'required|mimes:wav,mpeg,ogg,mp3,opus'
                // ]);
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
                    'file' => 'required|image|mimes:jpeg,bmp,png,jpg,mp3,opus',
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

    public function delete(Request $request)
    {
        $album = Album::find($request->album_id);
        if($album->profileAlbum == null){
            $album->familyAlbum()->delete();
        }else{
            $album->profileAlbum()->delete();
        }
        $path = 'assets/Gallary/'.$album->albumContentType->name.'/'.$album->name.'/';
        switch ($album->albumContentType->name) {
            case 'Audio':
                foreach($album->audios as $audio){
                   unlink($path.$audio->audio);
                   $audio->delete();
                }
               break;
            case 'Video':
                foreach($album->videos as $video){
                    unlink($path.$video->video);
                    $video->delete();
                }
               break;
            default:
                foreach($album->photos as $photo){
                   unlink($path.$photo->photo);
                   $photo->delete();
                }
               break;
        }
        rmdir($path);
       $album->delete();
       session()->flash('message','Album was successfully deleted');
       return back();
    }
}
