<?php

namespace Modules\Health\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|string',
            'hospital_type_id' => 'required',
            'hospital_category_id' => 'required',
            'address' => 'required',
            'town_id' => 'required'
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
