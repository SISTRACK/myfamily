<?php

namespace Modules\Birth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBirthFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'father_first_name'=>'required',
            'father_last_name'=>'required',
            'mother_first_name'=>'required',
            'mother_last_name'=>'required',
            'mother_status'=>'required',
            'child_name'=>'required',
            'gender'=>'required',
            'health_status'=>'required',
            'weight'=>'required',
            'date'=>'required',
            'place'=>'required',
            'deliver_at'=>'required',
            'weight'=>'required',
        ];

        if($this->has('midwifery_name')){
            $rules['midwifery_name'] = 'required|string';
            $rules['midwifery_surname'] = 'required|string';
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
        return true;
    }
}
