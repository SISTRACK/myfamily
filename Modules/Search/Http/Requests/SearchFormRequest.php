<?php

namespace Modules\Search\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if($this->genration){
            $rules['gen_no'] = 'required|integer';
        }elseif($this->search_identity){
            $rules['fname'] = 'required|string';
            $rules['lname'] = 'required|string';
        }elseif($this->search_relative){
            $rules['type'] = 'required';
            $rules['status'] = 'required';
        }else{
            $rules['email'] = 'required|email';
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
