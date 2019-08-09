<?php

namespace Modules\Security\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourtUserAgentFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:securities',
            'phone'=>'required',
            'gender_id'=>'required',
            'profile_id'=>'required',
            'court_id'=>'required',
            'state_id'=>'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(admin()){
            return true;
        }
        return false;
    }
}
