<?php

namespace Modules\Profile\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Services\Update\UpdateProfile;
use Modules\Profile\Entities\Image;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Core\Services\Traits\UploadFile;
use App\User;
use Illuminate\Support\Facades\Storage;
use Modules\Profile\Entities\ProfileAccess;
use Modules\Profile\Entities\Profile;
use Modules\Profile\Transformers\ProfileResource;
use Modules\Profile\Http\Requests\UpdateProfileFormRequest;

class ProfileController extends BaseController
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($family,$profile_id)
    {
        
        $profile = Profile::find($profile_id);
        
        return view('profile::index',['user'=>$profile->user]);
    }

    public function accessProfile($family,$profile_id)
    {
        session(['gues'=>$profile_id]);
        $user = User::find($profile_id);
        return redirect()->route('family.member.profile',[$user->profile->family->name, $user->profile->id]);
    }

    public function resumeProfile($id)
    {
        session()->forget('gues');

        return redirect()->route('family.member.profile',[profile()->family->name, profile()->id]);
    }

    public function blockProfileAccess($family,$id)
    {
        $access = null;
        foreach (ProfileAccess::where(['profile_id'=>$id, 'access_to_id'=>profile()->id])->get() as $user_access) {
            $access = $user_access;
        }
        $access->is_active = 0;
        $access->save();
        session()->flash('message','User was successfully blocked from viewing your profile');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
   

    /**
     * Show the specified resource.
     * @return Response
     */
    public function setting()
    {
        return view('profile::Forms.profile_setting',['user'=>Auth()->User()]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function userDetail()
    {
        return view('profile::Forms.user_detail');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateProfileFormRequest $request)
    {
        
        if($request->submit == 'upload_image'){
            $request->validate([
                'file' => 'required|image|mimes:jpeg,bmp,png,jpg',
            ]);
            $error = [];
            if(isset($request->id)){
                $user = User::find($request->id);
            }else{
                $user = Auth()->User();
            }   
            $profile = $user->profile;
            
            if(empty($error)){
                $path = $profile->profileImageLocation('upload');
                $image = $this->storeFile($request->file('file'),$path);
                if($profile->image_id > 2){
                    Storage::disk($this->fileSystem())->delete($path.$profile->image->name);
                    $image = $profile->image()->update(['name'=>$image]);
                }else{
                    $image = Image::create(['name'=>$image]);
                    $user->profile()->update(['image_id'=>$image->id]); 
                }
                session()->flash('message','Profile image uploaded Successfully');
            }else{
                session()->flash('error',$error);
            }           
        }else{
            new UpdateProfile($request->all());
        }
        
        return back();
    }

    public function api($id)
    {
        $profile = Profile::find($id);
        if(is_null($profile)){
            return 'Invalid Profile ID';
        }
        return new ProfileResource(Profile::find($id));
    }
}
