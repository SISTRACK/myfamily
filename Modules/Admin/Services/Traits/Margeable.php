<?php
namespace Modules\Admin\Services\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Family\Entities\SubFamily;
trait Margeable
{
    public function searchThisEmail($email)
    {  

        foreach (User::where('email',$email)->get() as $email) {
            return $email;
        }
    }
    public function margeThisFamilies()
    {
    	session('father_profile')->admin->family->subFamilies()->create(['sub_family_id'=>session('child_profile')->admin->family->id]);
    	session()->forget(['father_profile','mother_profile','child_profile']);
    	session()->flash('message','Congratulation your family was sucessfully marged to your father family and you are now fully member of that family');
    }
    public function verifyThisEmailsAndTheirProfiles($father_email,$child_email)
    {
        $child = $this->searchThisEmail($child_email);
        $father = $this->searchThisEmail($father_email);
        if(!$father){
            $this->errors[] = 'Sorry the father email does not exist';
        }

        if(!$father){
            $this->errors[] = 'Sorry the child email does not exist';
        }
       
        if(empty($this->errors)){
            $this->verifyThisProfilesFamilies($father->profile,$child->profile);
        }

    }

    public function verifyThisProfilesFamilies($father_profile, $child_profile)
    {
        
        if(!$father_profile->admin){
            $this->errors[] = 'Sorry the specify father email does does not belongs to any father';
        }
        if(!$child_profile->admin){
            $this->errors[] = 'Sorry the specify child email does does not belongs to any father';
        }
        if($father_profile->family->location->town->district != $child_profile->family->location->town->district){
        	$this->errors[] = "Sorry the specify email's profiles are in different District";
        }
        if($this->relatedFamilies($father_profile->family->id,$child_profile->family->id) || 
        	$this->relatedFamilies($child_profile->family->id,$father_profile->family->id)){
        	$this->errors[] = "Sorry the specify email's families are already related";
        }
        if(empty($this->errors)){
            session(['father_profile'=>$father_profile,'child_profile'=>$child_profile]);
        }
    }
    public function validateAndVerifyThisMother(array $data)
    {
        if($data['first_name'] != $data['last_name']){
            $this->errors[] = 'In valid mother first name and last name';
        }
        $wife = User::find($data['first_name'])->profile->wife;
        if($wife->status->id != $data['status']){
            $this->errors[] = 'In valid mother status selection';
        }

        if(!$this->errors){
            $child_profile = session('child_profile');
            $flag = false;
            session(['mother_profile'=>$wife->profile]);
            if($wife->mother){
                foreach ($wife->mother->births as $birth) {
                    if($birth->child->profile->user->first_name == $child_profile->user->first_name &&
                        $birth->child->profile->user->last_name == $child_profile->user->last_name){
                        $flag = true;
                    }
                }
            }

            if(!$flag){
                session()->flash('message','We find out that you have not register as the child of the specify mother you need to specify your birth information to complete this process');
            }

            return $flag;
        }
    }
    public function verifyMargeFamilies(Request $request)
    {
        $request->validate([
            'father_email' => 'required|email',
            'child_email' => 'required|email',
        ]);
        
        $this->verifyThisEmailsAndTheirProfiles($request->father_email,$request->child_email);
        if(empty($this->errors)){
            return redirect()->route('admin.config.father.child.family.marge.verify.father',[$request->father_family,$request->child_family]);
        }
        session()->flash('error',$this->errors);
        return back();
    }
    public function verifyMother(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'status'    => 'required'
        ]);
        $valid = $this->validateAndVerifyThisMother($request->all());
        if($valid){
            return back();
        }else{
            return redirect()->route('admin.config.father.child.family.marge.birth');
        }
    }

    public function relatedFamilies($family_id, $sub_family_id)
    {
    	$relation = null;
    	foreach(SubFamily::where(['family_id'=>$family_id,'sub_family_id'=>$sub_family_id])->get() as $family){
    		$relation = $family;
    	}
    	return $relation;
    }
}