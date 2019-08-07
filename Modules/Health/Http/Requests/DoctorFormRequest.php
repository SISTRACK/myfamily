<?php

namespace Modules\Health\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'gender_id' => 'required',
            'state_id' => 'required',
            'discpline_id' => 'required',
            'hospital_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:doctors',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:6|confirmed',
        
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
