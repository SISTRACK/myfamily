<?php

namespace Modules\Admin\Http\Controllers\Configuration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;

use Modules\Profile\Services\Update\UpdateProfile;
use Modules\Profile\Entities\Image;
use Modules\Core\Services\Traits\UploadFile;
use Illuminate\Support\Facades\Storage;
use Modules\Profile\Entities\ProfileAccess;
use Modules\Profile\Transformers\ProfileResource;
use Modules\Profile\Http\Requests\UpdateProfileFormRequest;
class ProfileController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::Configuration.Profile.index');
    }

    public function showThisProfile($profile)
    {
        return view('admin::Configuration.Profile.profile',['profile'=>Profile::find($profile)]);
    }
    public function showProfile(Request $request)
    {
        $request->validate(['profile_id'=>'required']);
        $profile = Profile::find($request->profile_id);

        if($profile){
            return redirect()->route('admin.config.user.profile',['profile'=>$profile->id]);
        }

        session()->flash('error',["Invalid Profile ID $request->profile_id"]);
        return back();
    }

    public function accessProfile($profile_id)
    {
        $profile = Profile::find($profile_id);
        return redirect()->route('admin.config.user.profile',[$profile->id]);
    }

    public function resumeProfile($profile_id)
    {
        return redirect()->route('family.member.profile',[profile()->family->name, profile()->id]);
    }

    public function blockProfileAccess($profile_id)
    {
        $access = null;
        foreach (ProfileAccess::where(['profile_id'=>$id, 'access_to_id'=>Profile::find($profile_id)->id])->get() as $user_access) {
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
    public function setting($profile_id)
    {
       
        return view('admin::Configuration.Profile.Forms.profile_setting',['user'=>Profile::find($profile_id)->user]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function userDetail()
    {
        return view('admin::Configuration.Profile.Forms.user_detail');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateProfileFormRequest $request,$profile_id)
    {
        if($request->submit == 'upload_image'){
            $request->validate([
                'file' => 'required|image|mimes:jpeg,bmp,png,jpg',
            ]);
            $error = [];
            $profile = Profile::find($profile_id); 
            if(empty($error)){
                $path = $profile->profileImageLocation('upload');
                $image = $this->storeFile($request->file('file'),$path);
                if($profile->image_id > 2){
                    Storage::disk($this->fileSystem())->delete(storage_url($path.$profile->image->name));
                    $image = $profile->image()->update(['name'=>$image]);
                }else{
                    $image = Image::create(['name'=>$image]);
                    $profile->update(['image_id'=>$image->id]); 
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
}
