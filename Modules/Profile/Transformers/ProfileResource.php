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
            'image' => $this->profileIMageLocation('display').$this->image->name,
            'home_address' => [
                'country'=>$this->address()['country'],
                'state'=>$this->address()['state'],
                'lga'=>$this->address()['lga'],
                'district'=>$this->address()['district'],
                'town'=>$this->address()['town'],
                'area'=>$this->address()['area'],
            ],
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
