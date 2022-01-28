<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemenFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'record' =>'required',
            'name' =>'required',
            'supplier_company' =>'required',
            'sexed' =>'required',
            'breed_id' =>'required',
            'blood_id' =>'required',
        ];
    }
    public function messages(){
      return [
          'record.required' =>'Esse campo é obrigatório',
          'name.required' =>'Esse campo é obrigatório',
          'supplier_company.required' =>'Esse campo é obrigatório',
          'sexed.required' =>'Esse campo é obrigatório',
          'breed_id.required' =>'Esse campo é obrigatório',
          'blood_id.required' =>'Esse campo é obrigatório',
      ];
    }
}
