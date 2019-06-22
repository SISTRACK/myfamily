<?php

namespace Modules\Profile\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
           
        ];
            if($this->has('file')){
                $rules['file'] = 'required|image|mimes:jpg,jpeg,png,gif';
            }

            switch ($this->submit) {
                case 'new_contact':
                $rules['contact'] = 'required';
                $rules['type'] = 'required';
                break;
            case 'new_certificate':
                $rules['name'] = 'required|integer';
                $rules['date'] = 'required|integer';
                $rules['certificate'] = 'required|image|mimes:jpg,jpeg,png,gif,pdf';
                break;

            case 'new_health':
                $rules['genotype'] = 'required';
                $rules['blood'] = 'required';
                $rules['weight'] = 'required';
                $rules['desease'] = 'required';
                break;
            
            case 'new_expertice':
                $rules['expertice'] = 'required';
                $rules['percentage'] = 'required|integer';
                break;

            case 'profile access':
                $rules['email'] = 'required|email';
                break;

            case 'new_experience':
                
                $rules['experience'] = 'required';
                $rules['from'] = 'required';
                $rules['to'] = 'required';
                $rules['about_experience'] = 'required';
                $rules['address'] = 'required';
                break;    
            
            case 'work_history':
                $rules['work_history_date'] = 'required';
                $rules['history'] = 'required';
                break;
            case 'new_business':
                $rules['business'] = 'required';
                $rules['about'] = 'required';
                break;
            case 'business_address':

                $rules['country'] = 'required';
                $rules['state'] = 'required';
                $rules['lga'] = 'required';
                $rules['town'] = 'required';
                $rules['company'] = 'required';
                $rules['office'] = 'required';
                $rules['position'] = 'required';
                break;

            case 'home_address':

                $rules['country'] = 'required';
                $rules['state'] = 'required';
                $rules['lga'] = 'required';
                $rules['district'] = 'required';
                $rules['town'] = 'required';
                $rules['area'] = 'required';
                $rules['house_no'] = 'required';
                $rules['house_desc'] = 'required';
                break;
            
            case 'new_biography':
                $rules['about_me'] = 'required';
                break;
            
            default:
                # code...
                break;
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
