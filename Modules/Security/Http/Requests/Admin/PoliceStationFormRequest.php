<?php

namespace Modules\Security\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PoliceStationFormRequest extends FormRequest
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
            'police_station_type_id' => 'required',
            'police_station_category_id' => 'required',
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
