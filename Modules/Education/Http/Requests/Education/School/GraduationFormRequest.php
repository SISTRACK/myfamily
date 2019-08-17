<?php

namespace Modules\Education\Http\Requests\Education\School;

use Illuminate\Foundation\Http\FormRequest;

class GraduationFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'year' => 'required',
            'class_honor' => 'required',
        ];
        if($this->has('discpline')){
            $rules['discpline'] = 'required';
        }
        if($this->has('certificate')){
            $rules['certificate'] = 'required|image|mimes:jpg,jpeg,png,gif';
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
        if(schoolAdmin()){
            return true;
        }else{
            return false;
        }
    }
}
