<?php

namespace Modules\Security\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourtFormRequest extends FormRequest
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
            'court_type_id' => 'required',
            'court_category_id' => 'required',
            'address' => 'required',
            'town_id' => 'required',
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
