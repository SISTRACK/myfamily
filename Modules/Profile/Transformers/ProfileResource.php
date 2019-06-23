<?php

namespace Modules\Profile\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ProfileResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fname' => $this->user->first_name,
            'lname' => $this->user->last_name,
            'email' => $this->user->email,
            'gender' => $this->gender->name,
            'family' => $this->thisProfileFamily()->name,
            'marrital_status' => $this->maritalStatus->name,
            'religion' => '',
            'date_of_birth' => date('d:M:Y',$this->date_of_birth),
            'biography' => $this->about_me,
            'created_at' => $this->created_at,
            'image' => $this->profileIMageLocation('display').$this->image->name,
            'home_address' => [
                'country'=>$this->address()['country'],
                'state'=>$this->address()['state'],
                'lga'=>$this->address()['lga'],
                'district'=>$this->address()['district'],
                'town'=>$this->address()['town'],
                'area'=>$this->address()['area'],
                'house_no'=>$this->address()['house_no'],
                'house_description'=>$this->address()['house_description'],
            ],
            'business_address' =>[
                'country'=>$this->businessAddress()['country'],
                'state'=>$this->businessAddress()['state'],
                'lga'=>$this->businessAddress()['lga'],
                'town'=>$this->businessAddress()['town'],
                'company'=>$this->businessAddress()['company'],
                'office'=>$this->businessAddress()['office'],
                'position'=>$this->businessAddress()['position'],
            ],
            'father'=>[],
            'mother'=>[],
        ];
    }
    public function with($request)
    {
        return [
            'version'=>'1.0.0',
            'attribution'=> 'attribution',
            'valid as of'=> time('D, d M Y H:i:s'),
            'api_call_remaining' => '2'
        ];
    }
}
