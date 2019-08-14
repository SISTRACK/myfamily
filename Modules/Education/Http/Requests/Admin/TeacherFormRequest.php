<?php

namespace Modules\Education\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeacherFormRequest extends FormRequest
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
            'email'=>'required|email|unique:teachers',
            'phone'=>'required|unique:teachers',
            'gender_id'=>'required',
            'password'=>'required|min:6',
            'school_id'=>'required',
            'state_id'=>'required',
        ];

        if ($this->has('edit')) {
            $rules['email'] = 'required|email';
            $rules['password'] = 'required|min:6';
            $rules['phone'] = 'required';
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
