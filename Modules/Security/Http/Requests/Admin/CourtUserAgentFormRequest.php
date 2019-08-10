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
        $rules = [
            'first_name'=>'required',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:securities',
            'phone'=>'required',
            'gender_id'=>'required',
            'password'=>'required|min:6',
            'court_id'=>'required',
            'state_id'=>'required',
        ];

        if ($this->has('edit')) {
            $rules['email'] = 'required|email';
            $rules['password'] = 'required|min:6';
        }

        return $rules;

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
